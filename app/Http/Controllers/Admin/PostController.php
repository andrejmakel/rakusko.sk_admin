<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Activity;
use App\Models\Opening;
use App\Models\OpeningNote;
use App\Models\OpeningText;
use App\Models\Post;
use App\Models\Price;
use App\Models\PriceNote;
use App\Models\PriceText;
use App\Models\Tag;
use App\Models\Lang;
use App\Models\TransPost;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posts = Post::with(['tags', 'activities', 'media'])->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::pluck('title_sk', 'id');

        $activities = Activity::pluck('title_de','id');

        $langs = Lang::all();

        return view('admin.posts.create', compact('tags', 'activities', 'langs'));
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());

        $post->tags()->sync($request->input('tags', []));
        $post->activities()->sync($request->input('activities', []));
        foreach ($request->input('cover_img', []) as $file) {
            $post->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('cover_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $post->id]);
        } 

         //Ukladanie prekladov

         foreach($request->transData as $data){
            $updatedData = [];
                foreach ($data as $key => $value) {
                    $newKey = trim($key, "'");
                    $updatedData[$newKey] = $value;
                }   
            $updatedData = ['origin_id' => $post->id] + $updatedData;  
            $updatedData = ['_token' => $request->_token] + $updatedData; 
            
                
            TransPost::create($updatedData);
        }
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::pluck('title_sk', 'id');

        $activities = Activity::pluck('title_de', 'id');

        $post->load('tags');

        $langs = Lang::all();

        if(count($langs) > count($post->originTransPosts)){
            $langsID = $langs->pluck('id')->toArray();
            $transPostLangsID = $post->originTransPosts->pluck('lang_id')->toArray();
            $missingID = array_diff($langsID, $transPostLangsID);
            foreach($missingID as $id){
                $transPost = new TransPost;
                $transPost->lang_id = $id;
                $transPost->origin_id = $post->id;
                $transPost->save();
            }
            
        }

        return view('admin.posts.edit', compact('post', 'tags', 'activities', 'langs'));
    }
    public function clone($id)
    {
        //duplikácia miesta
        $post = Post::where("id", $id)->firstOrFail();
        $clone = $post->replicate();
        

        //úprava slugu
        $baseSlug = $post->slug;
        $i = 1;
        while (Post::where('slug', $clone->slug)->exists()) {
            $clone->slug = $baseSlug . '-copy-' . $i;
            $i++;
        } 
        //uloženie clonu
        $clone->push();

        //dorobenie relationships
        $clone->tags()->saveMany($post->tags);
        $clone->activities()->saveMany($post->activities);

        //duplikácia médií
        foreach ($post->media as $media){
            $newMedia = $media->replicate();
            $newMedia->uuid = null;
            $newMedia->model_id = $clone->id;
            $filePath = $media->getPath();
            $clone->addMedia($filePath)
                ->preservingOriginal()
                ->usingName($media->name)
                ->usingFileName($media->file_name)
                ->toMediaCollection($media->collection_name);
        }

        return redirect("admin/posts/".$clone->id."/edit");
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());
        $post->tags()->sync($request->input('tags', []));
        $post->activities()->sync($request->input('activities', []));
        if (count($post->cover_img) > 0) {
            foreach ($post->cover_img as $media) {
                if (! in_array($media->file_name, $request->input('cover_img', []))) {
                    $media->delete();
                }
            }
        }
        $media = $post->cover_img->pluck('file_name')->toArray();
        foreach ($request->input('cover_img', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $post->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('cover_img');
            }
        }

        //Vymazanie a znovuvytvorenie prekladov


        foreach($post->originTransPosts as $transPost){
            $transPost->delete();
        }
        
        foreach($request->transData as $data){
            $updatedData = [];
                foreach ($data as $key => $value) {
                    $newKey = trim($key, "'");
                    $updatedData[$newKey] = $value;
                }   
            $updatedData = ['origin_id' => $post->id] + $updatedData;  
            $updatedData = ['_token' => $request->_token] + $updatedData; 
            
                
            TransPost::create($updatedData);
        }

        return redirect()->route('admin.posts.edit', $post->id);
    }

    public function show(Post $post)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->load('tags', 'activities', 'originTransPosts');

        return view('admin.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostRequest $request)
    {
        $posts = Post::find(request('ids'));

        foreach ($posts as $post) {
            $post->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('post_create') && Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Post();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

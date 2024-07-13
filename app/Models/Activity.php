<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Activity extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'activities';

    protected $appends = [
        'cover_img',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    protected $fillable = [
        'order',
        'title_sk',
        'title_de',
        'title_cs',
        'title_hu',
        'title_sl',
        'slug_sk',
        'slug_de',
        'slug_cs',
        'slug_hu',
        'slug_sl',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getCoverImgAttribute()
    {
        $files = $this->getMedia('cover_img');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }



    public function activityPosts()
    {
        return $this->belongsToMany(Post::class);
    }
}

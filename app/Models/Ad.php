<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Ad extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'ads';

    protected $appends = [
        'cover_img',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order',
        'title',
        'subtitle',
        'link',
        'lang_id',
        'created_at',
        'updated_at',
        'deleted_at',
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
        $file = $this->getMedia('cover_img')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function lang()
    {
        return $this->belongsTo(Lang::class, 'lang_id');
    }

    public function malls()
    {
        return $this->belongsToMany(Mall::class, 'ad_mall', 'ad_id', 'mall_id');
    }

    public function places()
    {
        return $this->belongsToMany(Place::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function infos()
    {
        return $this->belongsToMany(Info::class);
    }
}
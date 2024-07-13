<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Place extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'places';

    protected $appends = [
        'cover_img',
    ];

    protected $dates = [
        'update',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'zip',
        'update',
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

    public function originTransPlaces()
    {
        return $this->hasMany(TransPlace::class, 'origin_id', 'id');
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

    public function openings()
    {
        return $this->belongsToMany(Opening::class);
    }


    public function prices()
    {
        return $this->belongsToMany(Price::class);
    }


    public function getUpdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setUpdateAttribute($value)
    {
        $this->attributes['update'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}

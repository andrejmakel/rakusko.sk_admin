<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Mall extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'malls';

    protected $appends = [
        'cover_img',
    ];

    public static $searchable = [
        'title',
    ];

    protected $dates = [
        'update',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'map_embed',
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

    public function mallShops()
    {
        return $this->hasMany(Shop::class, 'mall_id', 'id');
    }

    public function originTransMalls()
    {
        return $this->hasMany(TransMall::class, 'origin_id', 'id');
    }

    public function ads()
    {
        return $this->belongsToMany(Ad::class, 'ad_mall', 'mall_id', 'ad_id');
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

    public function getUpdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setUpdateAttribute($value)
    {
        $this->attributes['update'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}

<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TransInfo extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    public $table = 'trans_infos';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'lang_id',
        'order',
        'title',
        'subtitle',
        'slug',
        'text',
        'link',
        'origin_id',
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

    public function lang()
    {
        return $this->belongsTo(Lang::class, 'lang_id');
    }

    public function origin()
    {
        return $this->belongsTo(Info::class, 'origin_id');
    }
}

<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opening extends Model
{
    use HasFactory;

    public $table = 'openings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'open_hours',
        'open_text_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function openingMalls()
    {
        return $this->belongsToMany(Mall::class);
    }

    public function openingShops()
    {
        return $this->belongsToMany(Shop::class);
    }

    public function openingPlaces()
    {
        return $this->belongsToMany(Place::class);
    }

    public function openingPosts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function openingInfos()
    {
        return $this->belongsToMany(Info::class);
    }

    public function open_text()
    {
        return $this->belongsTo(OpeningText::class, 'open_text_id');
    }
}

<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    use HasFactory;

    public $table = 'tags';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title_sk',
        'title_de',
        'title_cs',
        'title_hu',
        'title_sl',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tagsPlaces()
    {
        return $this->belongsToMany(Place::class);
    }

    public function tagsPosts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function tagsInfos()
    {
        return $this->belongsToMany(Info::class);
    }
}

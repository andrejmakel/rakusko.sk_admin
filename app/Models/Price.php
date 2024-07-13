<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory;

    public $table = 'prices';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'price',
        'price_text_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function pricePlaces()
    {
        return $this->belongsToMany(Place::class);
    }

    public function pricePosts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function priceInfos()
    {
        return $this->belongsToMany(Info::class);
    }

    public function price_text()
    {
        return $this->belongsTo(PriceText::class, 'price_text_id');
    }
}

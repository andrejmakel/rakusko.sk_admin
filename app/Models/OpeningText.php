<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningText extends Model
{
    use HasFactory;

    public $table = 'opening_texts';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'sk',
        'de',
        'cs',
        'hu',
        'sl',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function openTextOpenings()
    {
        return $this->hasMany(Opening::class, 'open_text_id', 'id');
    }
}

<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayName extends Model
{
    use HasFactory;

    public $table = 'holiday_names';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title_sk',
        'title_cs',
        'title_de',
        'title_hu',
        'title_sl',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function holidayNameHolidays()
    {
        return $this->hasMany(Holiday::class, 'holiday_name_id', 'id');
    }
}

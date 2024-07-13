<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayNamesTable extends Migration
{
    public function up()
    {
        Schema::create('holiday_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_sk')->nullable();
            $table->string('title_cs')->nullable();
            $table->string('title_de')->nullable();
            $table->string('title_hu')->nullable();
            $table->string('title_sl')->nullable();
            $table->timestamps();
        });
    }
}

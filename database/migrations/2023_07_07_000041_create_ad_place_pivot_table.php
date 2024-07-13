<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdPlacePivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_place', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_8645235')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id', 'place_id_fk_8645235')->references('id')->on('places')->onDelete('cascade');
        });
    }
}

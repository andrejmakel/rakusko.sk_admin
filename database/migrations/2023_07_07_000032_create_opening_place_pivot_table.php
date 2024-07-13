<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningPlacePivotTable extends Migration
{
    public function up()
    {
        Schema::create('opening_place', function (Blueprint $table) {
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id', 'place_id_fk_8166050')->references('id')->on('places')->onDelete('cascade');
            $table->unsignedBigInteger('opening_id');
            $table->foreign('opening_id', 'opening_id_fk_8166050')->references('id')->on('openings')->onDelete('cascade');
        });
    }
}

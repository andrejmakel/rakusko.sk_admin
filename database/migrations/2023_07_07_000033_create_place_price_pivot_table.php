<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacePricePivotTable extends Migration
{
    public function up()
    {
        Schema::create('place_price', function (Blueprint $table) {
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id', 'place_id_fk_8166052')->references('id')->on('places')->onDelete('cascade');
            $table->unsignedBigInteger('price_id');
            $table->foreign('price_id', 'price_id_fk_8166052')->references('id')->on('prices')->onDelete('cascade');
        });
    }
}

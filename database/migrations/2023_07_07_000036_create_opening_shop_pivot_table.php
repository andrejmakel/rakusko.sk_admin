<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningShopPivotTable extends Migration
{
    public function up()
    {
        Schema::create('opening_shop', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id', 'shop_id_fk_8165971')->references('id')->on('shops')->onDelete('cascade');
            $table->unsignedBigInteger('opening_id');
            $table->foreign('opening_id', 'opening_id_fk_8165971')->references('id')->on('openings')->onDelete('cascade');
        });
    }
}

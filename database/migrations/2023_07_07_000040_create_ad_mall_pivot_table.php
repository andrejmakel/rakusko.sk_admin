<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdMallPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_mall', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_8645234')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('mall_id');
            $table->foreign('mall_id', 'mall_id_fk_8645234')->references('id')->on('malls')->onDelete('cascade');
        });
    }
}

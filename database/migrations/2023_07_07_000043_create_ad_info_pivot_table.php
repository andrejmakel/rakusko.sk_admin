<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdInfoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_info', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_8645237')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('info_id');
            $table->foreign('info_id', 'info_id_fk_8645237')->references('id')->on('infos')->onDelete('cascade');
        });
    }
}

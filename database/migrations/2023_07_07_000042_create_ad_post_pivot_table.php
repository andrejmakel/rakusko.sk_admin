<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdPostPivotTable extends Migration
{
    public function up()
    {
        Schema::create('ad_post', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id', 'ad_id_fk_8645236')->references('id')->on('ads')->onDelete('cascade');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'post_id_fk_8645236')->references('id')->on('posts')->onDelete('cascade');
        });
    }
}

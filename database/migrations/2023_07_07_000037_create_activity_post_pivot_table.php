<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityPostPivotTable extends Migration
{
    public function up()
    {
        Schema::create('activity_post', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'post_id_fk_8322219')->references('id')->on('posts')->onDelete('cascade');
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id', 'activity_id_fk_8322219')->references('id')->on('activities')->onDelete('cascade');
        });
    }
}

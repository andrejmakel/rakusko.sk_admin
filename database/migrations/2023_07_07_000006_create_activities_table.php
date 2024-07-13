<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order');
            $table->string('title_sk');
            $table->string('title_de');
            $table->string('title_cs');
            $table->string('title_hu');
            $table->string('title_sl');
            $table->string('slug_sk');
            $table->string('slug_de');
            $table->string('slug_cs');
            $table->string('slug_hu');
            $table->string('slug_sl');
            $table->timestamps();
        });
    }
}

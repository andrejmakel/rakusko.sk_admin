<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallsTable extends Migration
{
    public function up()
    {
        Schema::create('malls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('map_embed');
            $table->integer('zip')->nullable();
            $table->date('update')->nullable();
            $table->timestamps();
        });
    }
}

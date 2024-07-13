<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavisTable extends Migration
{
    public function up()
    {
        Schema::create('navis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->string('titel_1')->nullable();
            $table->longText('text_1')->nullable();
            $table->string('titel_2')->nullable();
            $table->longText('text_2')->nullable();
            $table->string('titel_3')->nullable();
            $table->longText('text_3')->nullable();
            $table->string('titel_4')->nullable();
            $table->longText('text_4')->nullable();
            $table->string('titel_5')->nullable();
            $table->longText('text_5')->nullable();
            $table->string('coordinates')->nullable();
            $table->integer('zoom')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

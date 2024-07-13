<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselsTable extends Migration
{
    public function up()
    {
        Schema::create('carousels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('btn_1')->nullable();
            $table->string('btn_2')->nullable();
            $table->string('btn_3')->nullable();
            $table->string('btn_1_link')->nullable();
            $table->string('btn_2_link')->nullable();
            $table->string('btn_3_link')->nullable();
            $table->timestamps();
        });
    }
}

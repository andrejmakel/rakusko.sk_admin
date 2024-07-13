<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransShopsTable extends Migration
{
    public function up()
    {
        Schema::create('trans_shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order')->nullable();
            $table->string('subtitle')->nullable();
            $table->longText('text')->nullable();
            $table->longText('opening_note')->nullable();
            $table->timestamps();
        });
    }
}

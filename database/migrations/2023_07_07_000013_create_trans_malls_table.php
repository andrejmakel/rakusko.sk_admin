<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransMallsTable extends Migration
{
    public function up()
    {
        Schema::create('trans_malls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('link')->nullable();
            $table->longText('text')->nullable();
            $table->timestamps();
        });
    }
}

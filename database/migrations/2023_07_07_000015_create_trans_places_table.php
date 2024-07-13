<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransPlacesTable extends Migration
{
    public function up()
    {
        Schema::create('trans_places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('slug')->nullable();
            $table->longText('link')->nullable();
            $table->longText('excerp')->nullable();
            $table->longText('text')->nullable();
            $table->longText('opening_note')->nullable();
            $table->longText('price_note')->nullable();
            $table->longText('kontakt')->nullable();
            $table->longText('parking')->nullable();
            $table->longText('info')->nullable();
            $table->timestamps();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceTextsTable extends Migration
{
    public function up()
    {
        Schema::create('price_texts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sk')->nullable();
            $table->string('de')->nullable();
            $table->string('cs')->nullable();
            $table->string('hu')->nullable();
            $table->string('sl')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

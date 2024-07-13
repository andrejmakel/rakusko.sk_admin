<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_sk');
            $table->string('title_de');
            $table->string('title_cs');
            $table->string('title_hu');
            $table->string('title_sl');
            $table->timestamps();
        });
    }
}

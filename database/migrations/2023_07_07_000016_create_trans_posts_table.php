<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransPostsTable extends Migration
{
    public function up()
    {
        Schema::create('trans_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('slug')->nullable();
            $table->longText('text')->nullable();
            $table->longText('link')->nullable();
            $table->timestamps();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningsTable extends Migration
{
    public function up()
    {
        Schema::create('openings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('open_hours');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

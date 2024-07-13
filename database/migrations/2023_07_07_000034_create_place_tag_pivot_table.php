<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('place_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id', 'place_id_fk_8092399')->references('id')->on('places')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'tag_id_fk_8092399')->references('id')->on('tags')->onDelete('cascade');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTagPivotTable extends Migration
{
    public function up()
    {
        Schema::create('info_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('info_id');
            $table->foreign('info_id', 'info_id_fk_8166094')->references('id')->on('infos')->onDelete('cascade');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id', 'tag_id_fk_8166094')->references('id')->on('tags')->onDelete('cascade');
        });
    }
}

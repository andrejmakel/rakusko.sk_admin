<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOpeningsTable extends Migration
{
    public function up()
    {
        Schema::table('openings', function (Blueprint $table) {
            $table->unsignedBigInteger('open_text_id')->nullable();
            $table->foreign('open_text_id', 'open_text_fk_8165884')->references('id')->on('opening_texts');
        });
    }
}

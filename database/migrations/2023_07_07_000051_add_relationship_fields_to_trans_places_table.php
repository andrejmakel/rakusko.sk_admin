<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransPlacesTable extends Migration
{
    public function up()
    {
        Schema::table('trans_places', function (Blueprint $table) {
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->foreign('lang_id', 'lang_fk_8160039')->references('id')->on('langs');
            $table->unsignedBigInteger('origin_id')->nullable();
            $table->foreign('origin_id', 'origin_fk_8160055')->references('id')->on('places')->onDelete('cascade');
        });
    }
}

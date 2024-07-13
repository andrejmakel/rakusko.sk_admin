<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransShopsTable extends Migration
{
    public function up()
    {
        Schema::table('trans_shops', function (Blueprint $table) {
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->foreign('lang_id', 'lang_fk_8159984')->references('id')->on('langs');
            $table->unsignedBigInteger('origin_id')->nullable();
            $table->foreign('origin_id', 'origin_fk_8160000')->references('id')->on('shops')->onDelete('cascade');
        });
    }
}

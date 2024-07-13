<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransMallsTable extends Migration
{
    public function up()
    {
        Schema::table('trans_malls', function (Blueprint $table) {
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->foreign('lang_id', 'lang_fk_8159160')->references('id')->on('langs');
            $table->unsignedBigInteger('origin_id')->nullable();
            $table->foreign('origin_id', 'origin_fk_8159304')->references('id')->on('malls')->onDelete('cascade');
        });
    }
}

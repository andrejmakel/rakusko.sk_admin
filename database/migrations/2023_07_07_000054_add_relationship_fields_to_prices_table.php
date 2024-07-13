<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPricesTable extends Migration
{
    public function up()
    {
        Schema::table('prices', function (Blueprint $table) {
            $table->unsignedBigInteger('price_text_id')->nullable();
            $table->foreign('price_text_id', 'price_text_fk_8165160')->references('id')->on('price_texts');
        });
    }
}

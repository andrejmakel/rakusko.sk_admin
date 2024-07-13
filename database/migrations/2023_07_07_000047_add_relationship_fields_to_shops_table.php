<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToShopsTable extends Migration
{
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_8725129')->references('id')->on('teams');
            $table->unsignedBigInteger('mall_id')->nullable();
            $table->foreign('mall_id', 'mall_fk_8049640')->references('id')->on('malls');
        });
    }
}

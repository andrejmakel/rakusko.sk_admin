<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHolidaysTable extends Migration
{
    public function up()
    {
        Schema::table('holidays', function (Blueprint $table) {
            $table->unsignedBigInteger('holiday_name_id')->nullable();
            $table->foreign('holiday_name_id', 'holiday_name_fk_8652723')->references('id')->on('holiday_names');
        });
    }
}

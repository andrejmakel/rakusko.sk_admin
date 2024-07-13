<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransPostsTable extends Migration
{
    public function up()
    {
        Schema::table('trans_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('lang_id')->nullable();
            $table->foreign('lang_id', 'lang_fk_8160075')->references('id')->on('langs');
            $table->unsignedBigInteger('origin_id')->nullable();
            $table->foreign('origin_id', 'origin_fk_8166098')->references('id')->on('posts')->onDelete('cascade');
        });
    }
}

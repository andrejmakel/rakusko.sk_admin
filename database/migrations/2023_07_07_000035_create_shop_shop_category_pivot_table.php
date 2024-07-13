<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopShopCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('shop_shop_category', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id', 'shop_id_fk_8647759')->references('id')->on('shops')->onDelete('cascade');
            $table->unsignedBigInteger('shop_category_id');
            $table->foreign('shop_category_id', 'shop_category_id_fk_8647759')->references('id')->on('shop_categories')->onDelete('cascade');
        });
    }
}

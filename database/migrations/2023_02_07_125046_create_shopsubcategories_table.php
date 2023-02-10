<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopsubcategories', function (Blueprint $table) {
            $table->id('shop_subcategory_id');
            $table->string('shop_subcategory_code')->unique();
            $table->string('shop_subcategory_name');
            $table->string('shop_subcategory_description');
            $table->string('shop_subcategory_status');
            $table->foreignId('shop_category_id')->references('shop_category_id')->on('shopcategories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopsubcategories');
    }
};

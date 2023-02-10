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
        Schema::table('shops', function (Blueprint $table) {
            $table->foreignId('channel_id')->references('channel_id')->on('channels')->after('shop_name');
            $table->foreignId('class_id')->references('class_id')->on('shopclasses')->after('channel_id');
            $table->foreignId('shop_category_id')->references('shop_category_id')->on('shopcategories')->after('class_id');
            $table->foreignId('shop_subcategory_id')->references('shop_subcategory_id')->on('shopsubcategories')->after('shop_category_id');
            $table->string('shop_address')->after('shop_subcategory_id');
            $table->string('shop_status')->after('shop_description');
            $table->string('shop_owner_name')->after('shop_status');
            $table->integer('shop_owner_phone')->after('shop_owner_name');
            $table->string('shop_owner_status')->after('shop_owner_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            //
        });
    }
};

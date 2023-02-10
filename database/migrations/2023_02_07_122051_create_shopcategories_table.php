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
        Schema::create('shopcategories', function (Blueprint $table) {
            $table->id('shop_category_id');
            $table->string('shop_category_code')->unique();
            $table->string('shop_category_name');
            $table->string('shop_category_description');
            $table->string('shop_category_status');
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
        Schema::dropIfExists('shopcategories');
    }
};

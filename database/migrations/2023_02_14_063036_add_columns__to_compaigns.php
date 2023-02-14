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
        Schema::table('compaigns', function (Blueprint $table) {
            $table->date('compaign_start_date')->after('compaign_description');
            $table->date('compaign_end_date')->after('compaign_start_date');
            $table->string('compaign_status')->after('compaign_end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compaigns', function (Blueprint $table) {
            //
        });
    }
};

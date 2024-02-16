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
        Schema::create('organizations', function (Blueprint $table) {
            $table->string('bureau_code');
            $table->string('bureau_abv_name');
            $table->string('bureau_name');
            $table->string('division_code');
            $table->string('division_abv_name');
            $table->string('division_name');
            $table->string('station_code')->primary();
            $table->string('station_abv_name');
            $table->string('station_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};

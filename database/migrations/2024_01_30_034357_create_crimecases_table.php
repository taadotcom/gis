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
        Schema::create('crimecases', function (Blueprint $table) {
            $table->id();
            $table->string('main_charge');
            $table->string('incident_date');
            $table->string('incident_point');
            $table->string('incident_place');
            $table->decimal('lat',12,5);
            $table->decimal('lon',12,5);
            $table->string('4case_type');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crimecases');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chalans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mohajon_id');
            $table->string('mohajon_address');
            $table->dateTime('date');
            $table->string('fish_name');
            $table->string('kg_gram');
            $table->string('rate_per_kg');
            $table->string('total_taka');
            $table->string('total_kg');
            $table->string('last_total');
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
        Schema::dropIfExists('chalans');
    }
}

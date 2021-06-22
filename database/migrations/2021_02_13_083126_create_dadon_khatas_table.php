<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadonKhatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dadon_khatas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->dateTime('date');
            $table->string('day');
            $table->string('mobile');
            $table->float('total_amount');
            $table->float('paid')->nullable();
            $table->float('last_total');
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
        Schema::dropIfExists('dadon_khatas');
    }
}

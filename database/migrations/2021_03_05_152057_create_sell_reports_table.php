<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mohajon_id');
            $table->text('mohajon_address');
            $table->unsignedBigInteger('paikar_id');
            $table->text('paikar_address');
            $table->float('fish_weight');
            $table->float('price_per_kg');
            $table->float('total');
            $table->float('arot_total');
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
        Schema::dropIfExists('sell_reports');
    }
}

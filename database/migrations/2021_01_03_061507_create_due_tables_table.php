<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDueTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('due_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paiker_id');
            $table->text('address');
            $table->float('due_amount_today');
            $table->float('hal');
            $table->float('total');
            $table->float('paid');
            $table->float('total_due');
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
        Schema::dropIfExists('due_tables');
    }
}

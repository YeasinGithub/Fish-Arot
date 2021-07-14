<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChalanBadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chalan_bads', function (Blueprint $table) {
            $table->id();
            $table->string('mondir')->nullable();
            $table->string('komition')->nullable();
            $table->string('khajna')->nullable();
            $table->string('nagad')->nullable();
            $table->string('koheli')->nullable();
            $table->string('somity')->nullable();
            $table->string('gari_bara')->nullable();
            $table->string('line_cost')->nullable();
            $table->string('parking')->nullable();
            $table->string('haolat')->nullable();
            $table->string('ice')->nullable();
            $table->string('kuli')->nullable();
            $table->string('baje_cost')->nullable();
            $table->string('tity_didy')->nullable();
            $table->string('amanot')->nullable();
            $table->string('duty')->nullable();
            $table->string('total');
            $table->string('chalan_total');
            $table->string('khoros_bad');
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
        Schema::dropIfExists('chalan_bads');
    }
}

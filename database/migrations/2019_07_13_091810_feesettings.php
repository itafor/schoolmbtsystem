<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Feesettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feesettings', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('className')->default('form1');
            $table->string('sessionName')->default('2019');
            $table->string('term')->default('First Term');
            $table->string('item')->default('2000');
            $table->integer('feeAmount')->default('2000');
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
        Schema::dropIfExists('feesettings');
    }
}

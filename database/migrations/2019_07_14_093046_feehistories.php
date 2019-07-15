<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Feehistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feehistories', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('className');
            $table->string('sessionName');
            $table->string('term');
            $table->integer('feeAmount');
            $table->integer('amountPaid');
            $table->string('item');
            $table->integer('balance');
            $table->string('status');
            $table->string('datePaid');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('feehistories');
    }
}

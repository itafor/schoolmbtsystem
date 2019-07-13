<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Results extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('results', function (Blueprint $table) {
            $table->increments('id')->nullable();
             $table->string('studentclass');
            $table->unsignedInteger('user_id');
            $table->string('studentRegNumber');
            $table->integer('testscore');
            $table->integer('examscore');
            $table->integer('totalmark');
            $table->integer('position');
            $table->integer('points');
            $table->string('remark');
            $table->string('subject');
            $table->string('session');
            $table->string('term');
            $table->foreign('user_id')->references('id')->on('users');
            $table->rememberToken();
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
        Schema::dropIfExists('results');
    }
}

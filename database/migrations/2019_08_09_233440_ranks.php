<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ranks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->integer('totalMark');
            $table->integer('rank');
            $table->string('studentRegNumber');
            $table->string('sessionName');
            $table->string('term');
            $table->string('studentclass');
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
       Schema::dropIfExists('ranks');
    }
}

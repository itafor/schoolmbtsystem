<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Terms extends Migration
{
   
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('terms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('termName');
            $table->timestamps();
            $table->time('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terms');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generalsettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('schoolName')->nullable();
            $table->string('pob')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('cellPhone')->nullable();
            $table->string('schoolLogo')->nullable();
            $table->text('schoolAddress')->nullable();
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
        Schema::dropIfExists('generalsettings');
        
    }
}

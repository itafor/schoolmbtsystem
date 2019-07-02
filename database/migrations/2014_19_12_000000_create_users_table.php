<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('username');
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('studentRegNumber')->nullable();
            $table->string('gender');
            $table->string('studentClass')->nullable();
            $table->string('address');
            $table->string('phoneNo')->nullable();
            $table->string('role');
            $table->string('birthday')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('users');
    }
}

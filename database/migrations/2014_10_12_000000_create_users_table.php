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
            $table->string('nameWithInitials');
            $table->string('name');
            $table->string('nic');
            $table->string('address');
            $table->string('pollingDivision')->nullable();
            $table->string('contactNumber');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profilePic')->default('default.jpg');
            $table->boolean('isActive')->default(0);

            $table->string('verifyToken')->nullable();
            $table->boolean('status')->default(0);

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

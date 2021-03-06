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

            $table->string('username', 20)->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('avatar', 30)->default('male.png');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'register', 'cashier']);
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
        Schema::drop('users');
    }
}

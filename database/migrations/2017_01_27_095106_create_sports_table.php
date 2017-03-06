<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsTable extends Migration
{
    public function up()
    {
        Schema::create('sport', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 25)->unique();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sport');
    }
}

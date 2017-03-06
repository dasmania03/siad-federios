<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    public function up()
    {
        Schema::create('cv17_ventas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('inscription_id')->unsigned();
            $table->foreign('inscription_id')->references('id')->on('cv17_inscriptions');

            $table->decimal('price');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cv17_ventas');
    }
}

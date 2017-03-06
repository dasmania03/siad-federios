<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionTable extends Migration
{
    public function up()
    {
        Schema::create('cv17_inscriptions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('athlete_id')->unsigned();
            $table->foreign('athlete_id')->references('id')->on('cv17_athletes');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('cv17_products');

            $table->string('horario', 20);
            $table->string('dias', 100);
            $table->integer('discount');
            $table->decimal('paid_total');
            $table->string('observations', 255)->nullable();
            $table->string('code_exo', 8)->nullable();
            $table->string('status', 1);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cv2017_inscriptions');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv17_products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sport');

            $table->string('detail', 150);
            $table->integer('age_min');
            $table->integer('age_max');
            $table->string('horarys', 250);
            $table->string('days', 250);
            $table->integer('quotas');
            $table->decimal('price');

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
        Schema::dropIfExists('cv17_products');
    }
}

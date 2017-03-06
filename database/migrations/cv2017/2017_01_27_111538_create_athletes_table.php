<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv17_athletes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('identification', 20)->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('full_name', 200);
            $table->date('birth_date');
            $table->string('age', 2);
            $table->string( 'address', 100);
            $table->string( 'telephone', 20);
            $table->string( 'email', 100);
            $table->string('size', 2);
            $table->string('gender', 1);
            $table->string('type_disability', 1)->nullable();

            $table->integer('agent_id')->unsigned();
            $table->foreign('agent_id')->references('id')->on('cv17_agents');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('cv17_athletes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv17_agents', function (Blueprint $table) {
            $table->increments('id');

            $table->string('identification', 20)->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('full_name', 200);
            $table->string( 'telephone', 20);
            $table->string( 'email', 100);

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
        Schema::dropIfExists('cv17_agents');
    }
}

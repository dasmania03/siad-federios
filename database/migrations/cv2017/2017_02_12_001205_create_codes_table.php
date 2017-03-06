<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesTable extends Migration
{
    public function up()
    {
        Schema::create('cv17_codes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('codes', 8)->unique();
            $table->boolean('status')->default(false);
            $table->string('image', 12);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cv17_codes');
    }
}

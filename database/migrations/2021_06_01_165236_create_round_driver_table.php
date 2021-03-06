<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoundDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('round_driver', function (Blueprint $table) {
            $table->string('round_id');
            $table->string('driver_id');
            $table->foreign('round_id')->references('id')->on('rounds');
            $table->foreign('driver_id')->references('id')->on('drivers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('round_driver');
    }
}

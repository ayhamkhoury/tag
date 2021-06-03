<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('rounds', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('details')->nullable();
            $table->string('racetrack')->nullable();
            $table->string('map_image')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();     
            $table->tinyInteger('status')->default(0);
            $table->string('race_id');
            $table->timestamps();
            $table->foreign('race_id')->references('id')->on('races');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rounds');
    }
}

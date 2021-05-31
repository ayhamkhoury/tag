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
            $table->string('details');
            $table->string('map_image');
            $table->string('start_date');
            $table->string('end_date');      
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

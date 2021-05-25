<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name');
            $table->String('team');
            $table->foreign('team')->references('team')->on('players')->onDelete('cascade');
            $table->String('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->String('server_id');
            $table->foreign('server_id')->references('id')->on('servers')->onDelete('cascade');
            $table->date('date');
            $table->String('prize');
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
        Schema::dropIfExists('tournaments');
    }
}

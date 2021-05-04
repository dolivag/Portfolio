<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('stadium');
            $table->unsignedBigInteger('team1');
            $table->foreign('team1')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('result1');
            $table->unsignedBigInteger('team2');
            $table->foreign('team2')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('result2');
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
        Schema::dropIfExists('games');
    }
}

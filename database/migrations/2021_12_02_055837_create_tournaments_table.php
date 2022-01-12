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
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_private')->default(false);
            $table->string('prize_type');
            $table->string('status')->nullable();
            $table->string('prize_amount');
            $table->integer('teams_amount');
            $table->integer('teams_players_amount');
            $table->foreignId('game_id')->references('id')->on('games');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->foreignId('match_format_id')->references('id')->on('match_formats');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->boolean('is_finished')->default(false);
            $table->integer('play_off_amount')->nullable();
            $table->boolean('is_there_group_stage')->default(true);
            $table->timestamps();
            $table->softDeletes();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_tournaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->references('id')->on('teams');
            $table->foreignId('tournament_id')->references('id')->on('tournaments');
            $table->boolean('is_winner')->nullable();
            $table->string('group')->nullable()->comment('Название группы, Группа A, Группа B и др.');
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
        Schema::dropIfExists('team_tournaments');
    }
}

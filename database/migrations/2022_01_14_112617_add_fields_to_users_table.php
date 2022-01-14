<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string("steam_id")->nullable();
            $table->string("gender")->default("male");
            $table->string("birth_date")->nullable();
            $table->string("country")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('surname');
            $table->dropColumn("steam_id");
            $table->dropColumn("gender");
            $table->dropColumn("birth_date");
            $table->dropColumn("country");
        });
    }
}

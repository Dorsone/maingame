<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 16.04.2021 2:04
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserFields extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('interests')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('description');
            $table->dropColumn('interests');
        });
    }
}

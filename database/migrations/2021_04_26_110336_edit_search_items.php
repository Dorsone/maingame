<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 26.04.2021 11:03
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditSearchItems extends Migration
{
    public function up()
    {
        Schema::table('search_items', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id');
        });
    }

    public function down()
    {
        Schema::table('search_items', function (Blueprint $table) {
            $table->dropColumn('article_id');
        });
    }
}

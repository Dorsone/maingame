<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 26.04.2021 10:45
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditFkeys extends Migration
{
    public function up()
    {

        Schema::table('articles_tags_pivot', function (Blueprint $table) {

            $table->dropForeign('fk_articles_tags_pivot_art');
            $table->dropForeign('fk_articles_tags_pivot_tag');

            $table->foreign('article_id', 'fk_articles_tags_pivot_art')
                ->references('id')
                ->on('articles')->onDelete('cascade');

            $table->foreign('tag_id', 'fk_articles_tags_pivot_tag')
                ->references('id')
                ->on('articles_tags')->onDelete('cascade');
        });


    }

    public function down()
    {
    }
}

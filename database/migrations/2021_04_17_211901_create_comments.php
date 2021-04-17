<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 17.04.2021 21:19
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComments extends Migration
{
    public function up()
    {
        Schema::create('articles_comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0);
            $table->unsignedBigInteger('article_id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->text('answer')->nullable();

            $table->foreign('article_id', 'fk_articles_comment_article_id')
                ->references('id')
                ->on('articles_categories');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles_comment');
    }
}

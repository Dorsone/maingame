<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 14.04.2021 21:17
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticles extends Migration
{
    public function up()
    {

        Schema::create('articles_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0);
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();

            $table->string('breadcrumbs_title')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_h1')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_text')->nullable();
            $table->integer('parent_id')->default(0)->nullable();
            $table->integer('lft')->unsigned()->nullable();
            $table->integer('rgt')->unsigned()->nullable();
            $table->integer('depth')->unsigned()->nullable();

            $table->timestamps();
        });

        Schema::create('articles_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content_preview')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->date('date');
            $table->integer('time_read')->nullable();
            $table->bigInteger('views')->nullable();

            $table->string('breadcrumbs_title')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_h1')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_text')->nullable();
            $table->integer('parent_id')->default(0)->nullable();
            $table->integer('lft')->unsigned()->nullable();
            $table->integer('rgt')->unsigned()->nullable();
            $table->integer('depth')->unsigned()->nullable();


            $table->timestamps();

            $table->foreign('category_id', 'fk_articles_category_id')
                ->references('id')
                ->on('articles_categories');

            $table->foreign('user_id', 'fk_articles_user_id')
                ->references('id')
                ->on('users');
        });

        Schema::create('articles_tags_pivot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->foreign('article_id', 'fk_articles_tags_pivot_art')
                ->references('id')
                ->on('articles');

            $table->foreign('tag_id', 'fk_articles_tags_pivot_tag')
                ->references('id')
                ->on('articles_tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles_tags_pivot');
        Schema::dropIfExists('articles_tags');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('articles_categories');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0);
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content')->nullable();
            $table->date('date');

            $table->string('breadcrumbs_title')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_h1')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->integer('parent_id')->default(0)->nullable();
            $table->integer('lft')->unsigned()->nullable();
            $table->integer('rgt')->unsigned()->nullable();
            $table->integer('depth')->unsigned()->nullable();

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
        Schema::dropIfExists('static_infos');
    }
}

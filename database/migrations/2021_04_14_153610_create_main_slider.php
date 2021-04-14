<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 14.04.2021 15:36
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainSlider extends Migration
{
    public function up()
    {
        Schema::create('main_slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0);
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('lft')->unsigned()->nullable();
            $table->integer('rgt')->unsigned()->nullable();
            $table->integer('depth')->unsigned()->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('main_slides');
    }
}

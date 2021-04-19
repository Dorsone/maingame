<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 17.04.2021 23:22
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchItems extends Migration
{
    public function up()
    {
        Schema::create('search_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('url');
            $table->string('description')->nullable();
            $table->string('breadcrumbs')->nullable();
            $table->timestamps();
        });

        Schema::create('search_index', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('items_id');
            $table->text('text');
            $table->integer('weight');
            $table->boolean('need_delete')->default(0);
            $table->timestamps();

            $table->foreign('items_id', 'fk_search_index_items_id')
                ->references('id')
                ->on('search_items')->onDelete('cascade');
        });

        DB::statement('ALTER TABLE search_index ADD FULLTEXT search(text)');
    }

    public function down()
    {
        Schema::table('search_index', function ($table) {
            $table->dropIndex('search');
            $table->dropForeign('fk_search_index_items_id');
        });
        Schema::dropIfExists('search_index');
        Schema::dropIfExists('search_items');
    }
}

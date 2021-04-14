<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->text('value')->nullable();
            $table->text('field');
            $table->tinyInteger('active');
            $table->timestamps();
        });

        $settings = [
            [
                'key' => 'social_vk',
                'name' => 'Ссылка на vk.com',
                'description' => '',
                'value' => '',
                'field' => '{"name":"value","label":"Значение","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'social_fb',
                'name' => 'Ссылка на facebook.com',
                'description' => '',
                'value' => '',
                'field' => '{"name":"value","label":"Значение","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'social_google',
                'name' => 'Ссылка на google+',
                'description' => '',
                'value' => '',
                'field' => '{"name":"value","label":"Значение","type":"text"}',
                'active' => 1,
            ],
        ];

        foreach ($settings as $index => $setting) {
            $result = DB::table('settings')->insert($setting);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}

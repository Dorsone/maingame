<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 15.04.2021 21:19
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingsValue extends Migration
{
    public function up()
    {
        $settings = [
            [
                'key' => 'paginate_per_page',
                'name' => 'Статей на странице',
                'description' => 'Количество статей на странице категории, по умолчанию 9',
                'value' => '9',
                'field' => '{"name":"value","label":"Значение","type":"text"}',
                'active' => 1,
            ],
        ];

        foreach ($settings as $index => $setting) {
            $result = DB::table('settings')->insert($setting);
        }
    }

    public function down()
    {
        Schema::table('', function (Blueprint $table) {
            //
        });
    }
}

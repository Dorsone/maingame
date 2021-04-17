<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 17.04.2021 16:06
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditSettingsMailchimp extends Migration
{
    public function up()
    {
        $settings = [
            [
                'key' => 'mailchimp_token',
                'name' => 'Mailchimp API Token',
                'description' => 'Токен для доступа к апи Mailchimp',
                'value' => '',
                'field' => '{"name":"value","label":"Значение","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'mailchimp_prefix',
                'name' => 'Mailchimp Префикс домена',
                'description' => 'Префикс домена для доступа к апи Mailchimp',
                'value' => '',
                'field' => '{"name":"value","label":"Значение","type":"text"}',
                'active' => 1,
            ],
            [
                'key' => 'mailchimp_list_id',
                'name' => 'Mailchimp ID списка',
                'description' => 'ID списка Mailchimp в который будет добавлен подписчик',
                'value' => '',
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
    }
}

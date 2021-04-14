<?php
/**
 * Created by Konstantin Potapov.
 * Email: k.m.potapov@mail.ru
 * Date: 14.04.2021 0:07
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->updateOrInsert(
            [
                'email' => 'test@test.com',
            ],
            [
                'name' => 'Admin Adminov',
                'email' => 'test@test.com',
                'password' => \Hash::make('123456789'),
            ]);
    }
}

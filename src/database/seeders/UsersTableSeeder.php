<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = [
            'name' => '管理者',
            'email' => 'k@k',
            'password' => '1111',
            'email_verified_at' => '2024-10-24 00:00:00',
            'token' => 'hj5IHW',
            'authorify' => '1'
        ];
        DB::table('users')->insert($content);
    }
}

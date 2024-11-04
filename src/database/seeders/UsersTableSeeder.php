<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\CarbonImmutable;

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
            'email' => 'admin@mail.com',
            'password' => Hash::make('1111'),
            'email_verified_at' => CarbonImmutable::today(),
            'authorify' => '1'
        ];
        DB::table('users')->insert($content);

        $content = [
            'name' => '店舗代表者',
            'email' => 'sennin@mail.com',
            'password' => Hash::make('0001'),
            'email_verified_at' => CarbonImmutable::today(),
            'authorify' => '2'
        ];
        DB::table('users')->insert($content);
    }
}

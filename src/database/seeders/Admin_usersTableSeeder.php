<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\CarbonImmutable;

class Admin_usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = [
            'name' => '管理者1',
            'email' => 'admin@mail.com',
            'password' => Hash::make('1111'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('admin_users')->insert($content);

        $content = [
            'name' => '管理者2',
            'email' => 'admin2@mail.com',
            'password' => Hash::make('2222'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('admin_users')->insert($content);

        $content = [
            'name' => '管理者3',
            'email' => 'admin3@mail.com',
            'password' => Hash::make('3333'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('admin_users')->insert($content);
    }

}

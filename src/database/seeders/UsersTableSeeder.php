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
            'name' => 's',
            'email' => 's@mail.com',
            'password' => Hash::make('9999'),
            'email_verified_at' => CarbonImmutable::today()
        ];
        DB::table('users')->insert($content);
}
}
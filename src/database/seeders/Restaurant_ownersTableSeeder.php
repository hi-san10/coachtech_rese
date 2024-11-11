<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\CarbonImmutable;

class Restaurant_ownersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = [
            'name' => '仙人代表者',
            'restaurant_id' => '1',
            'email' => 'sennin@mail.com',
            'password' => Hash::make('0001'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '牛助代表者',
            'restaurant_id' => '2',
            'email' => 'gyuusuke@mail.com',
            'password' => Hash::make('0002'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '戦慄代表者',
            'restaurant_id' => '3',
            'email' => 'senritsu@mail.com',
            'password' => Hash::make('0003'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => 'ルーク代表者',
            'restaurant_id' => '4',
            'email' => '@mail.com',
            'password' => Hash::make('0004'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '志摩屋代表者',
            'restaurant_id' => '5',
            'email' => 'shimaya@mail.com',
            'password' => Hash::make('0005'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '香代表者',
            'restaurant_id' => '6',
            'email' => 'kaori@mail.com',
            'password' => Hash::make('0006'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => 'JJ代表者',
            'restaurant_id' => '7',
            'email' => 'jj@mail.com',
            'password' => Hash::make('0007'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => 'らーめん極み代表者',
            'restaurant_id' => '8',
            'email' => 'ramenkiwami@mail.com',
            'password' => Hash::make('0008'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '鳥雨代表者',
            'restaurant_id' => '9',
            'email' => 'toriu@mail.com',
            'password' => Hash::make('0009'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '築地色合代表者',
            'restaurant_id' => '10',
            'email' => 'tsukijiiroai@mail.com',
            'password' => Hash::make('0010'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '晴海代表者',
            'restaurant_id' => '11',
            'email' => 'harumi@mail.com',
            'password' => Hash::make('0011'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '三子代表者',
            'restaurant_id' => '12',
            'email' => 'mitsuko@mail.com',
            'password' => Hash::make('0012'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '八戒代表者',
            'restaurant_id' => '13',
            'email' => 'hakkai@mail.com',
            'password' => Hash::make('0013'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '福助代表者',
            'restaurant_id' => '14',
            'email' => 'fukusuke@mail.com',
            'password' => Hash::make('0014'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => 'らー北代表者',
            'restaurant_id' => '15',
            'email' => 'rahoku@mail.com',
            'password' => Hash::make('0015'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '翔代表者',
            'restaurant_id' => '16',
            'email' => 'kakeru@mail.com',
            'password' => Hash::make('0016'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '経緯代表者',
            'restaurant_id' => '17',
            'email' => 'keii@mail.com',
            'password' => Hash::make('0017'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '漆代表者',
            'restaurant_id' => '18',
            'email' => 'urushi@mail.com',
            'password' => Hash::make('0018'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => 'THETOOL代表者',
            'restaurant_id' => '19',
            'email' => 'thetool@mail.com',
            'password' => Hash::make('0019'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);

        $content = [
            'name' => '木船代表者',
            'restaurant_id' => '20',
            'email' => 'kifune@mail.com',
            'password' => Hash::make('0020'),
            'email_verified_at' => CarbonImmutable::today(),
        ];
        DB::table('restaurant_owners')->insert($content);
    }
}

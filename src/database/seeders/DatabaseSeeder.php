<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PrefecturesTableSeeder::class);
        // $this->call(GenresTableSeeder::class);
        // $this->call(RestaurantsTableSeeder::class);
        $this->call(Admin_usersTableSeeder::class);
        $this->call(Restaurant_ownersTableSeeder::class);
        // User::factory(20)->create();
    }
}

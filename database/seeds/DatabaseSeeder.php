<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Setup
        $this->call(RolesTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        // Dummy data
        $this->call(PostsTableSeeder::class);
    }
}

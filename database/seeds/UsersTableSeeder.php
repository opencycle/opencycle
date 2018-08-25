<?php

use OpenCycle\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'admin@opencycle.com',
            'password' => bcrypt('password'),
        ]);
    }
}

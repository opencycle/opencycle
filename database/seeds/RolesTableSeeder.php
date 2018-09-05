<?php

use Illuminate\Database\Seeder;
use Opencycle\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Role::class)->create([
            'name' => 'admin',
        ]);

        factory(Role::class)->create([
            'name' => 'moderator',
        ]);
    }
}

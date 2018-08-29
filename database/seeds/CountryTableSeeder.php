<?php

use Illuminate\Database\Seeder;
use Opencycle\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class)->create([
            'name' => 'United Kingdom',
        ]);
    }
}

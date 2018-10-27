<?php

use Illuminate\Database\Seeder;
use Opencycle\Country;
use PragmaRX\CountriesLaravel\Package\Facade as Countries;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Countries::random(10)->each(function ($country) {
            factory(Country::class)->create([
                'name' => $country->name->common,
                'code' => $country->cca3,
            ]);
        });
    }
}

<?php

use Faker\Generator as Faker;
use Opencycle\Country;

$factory->define(Opencycle\Region::class, function (Faker $faker) {
    return [
        'name' => $faker->state,
        'country_id' => function () {
            return Country::inRandomOrder()->first()->id;
        }
    ];
});

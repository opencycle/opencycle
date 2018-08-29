<?php

use Faker\Generator as Faker;

$factory->define(Opencycle\Country::class, function (Faker $faker) {
    return [
        'name' => $faker->country,
    ];
});

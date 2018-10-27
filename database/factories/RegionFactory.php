<?php

use Faker\Generator as Faker;
use Opencycle\Country;
use Opencycle\Region;

$factory->define(Region::class, function (Faker $faker) {
    return [
        'name' => $faker->state,
        'country_id' => function () {
            return factory(Country::class)->create()->id;
        }
    ];
});

<?php

use Faker\Generator as Faker;
use Opencycle\Country;

$factory->define(Country::class, function (Faker $faker) {
    $country = Countries::random();

    return [
        'name' => $country->name->common,
        'code' => $country->cca3,
    ];
});

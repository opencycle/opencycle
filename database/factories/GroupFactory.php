<?php

use Faker\Generator as Faker;

$factory->define(Opencycle\Group::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

<?php

use Faker\Generator as Faker;
use Opencycle\Role;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

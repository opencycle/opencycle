<?php

use Faker\Generator as Faker;

use Opencycle\Advert;
use Opencycle\User;

$factory->define(Advert::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});

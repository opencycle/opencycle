<?php

use Faker\Generator as Faker;

use Opencycle\Post;
use Opencycle\User;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});

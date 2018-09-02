<?php

use Faker\Generator as Faker;
use Opencycle\Post;
use Opencycle\User;
use Opencycle\Group;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'location' => $faker->streetName,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'group_id' => function () {
            return factory(Group::class)->create()->id;
        }
    ];
});

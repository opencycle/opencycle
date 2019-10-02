<?php

use Faker\Generator as Faker;
use Opencycle\Post;
use Opencycle\User;
use Opencycle\Group;
use Opencycle\Role;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'type' => $faker->randomElement(['offer', 'wanted']),
        'location' => $faker->streetName,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'group_id' => function () {
            return factory(Group::class)->create()->id;
        }
    ];
});

$factory->afterCreating(Post::class, function ($post, $faker) {
    $post->user->groups()->save($post->group, ['role_id' => Role::inRandomOrder()->first()->id]); // TODO: Seed null values as well
});

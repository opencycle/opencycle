<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Opencycle\User;
use Opencycle\Group;
use Opencycle\Role;

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make(Str::random(10)),
        'remember_token' => Str::random(10),
    ];
});

$factory->afterCreatingState(User::class, 'withGroup', function ($user, $faker) {
    $user->groups()->save(factory(Group::class)->create());
});

$factory->afterCreatingState(User::class, 'withAdminGroup', function ($user, $faker) {
    $user->groups()->save(factory(Group::class)->create(), ['role_id' => Role::ofType(Role::ADMIN)->id]);
});

$factory->afterCreatingState(User::class, 'withModeratorGroup', function ($user, $faker) {
    $user->groups()->save(factory(Group::class)->create(), ['role_id' => Role::ofType(Role::MODERATOR)->id]);
});

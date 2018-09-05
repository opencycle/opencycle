<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Opencycle\User;
use Opencycle\Role;

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

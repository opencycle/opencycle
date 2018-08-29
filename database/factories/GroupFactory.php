<?php

use Faker\Generator as Faker;
use Opencycle\Group;
use Opencycle\Region;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'region_id' => function () {
            return factory(Region::class)->create()->id;
        },
    ];
});

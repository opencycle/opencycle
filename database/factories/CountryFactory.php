<?php

use Faker\Generator as Faker;
use Opencycle\Country;

$factory->define(Country::class, function (Faker $faker) {
    $list = [
        'AR',
        'AU',
        'AT',
        'BE',
        'BR',
        'CM',
        'CA',
        'CN',
        'CO',
        'HR',
        'CU',
        'CY',
        'EC',
        'ET',
        'DK',
        'FI',
        'FR',
        'DE',
        'GR',
        'GT',
        'HU',
        'IE',
        'JP',
        'LV',
        'NZ',
        'NO',
        'SE',
        'TN',
        'GB',
        'US',
        'ZM',
    ];

    $country = Countries::where('cca2', collect($list)->random())->first();

    return [
        'name' => $country->name->common,
        'code' => $country->cca3,
    ];
});

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Requirements
    |--------------------------------------------------------------------------
    |
    | These are the requirements for Opencycle.
    |
    */

    'requirements' => [

        'modules' => [
            'openssl',
            'pdo',
            'mbstring',
            'tokenizer',
            'JSON',
            'cURL',
        ],

        'writable' => [
            'storage/framework/',
            'storage/logs/',
            'bootstrap/cache/',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Image Uploads
    |--------------------------------------------------------------------------
    |
    | This option controls the maximum size in bytes of uploaded post images.
    |
    */

    'uploads' => [
        'maxSize' => 5000000,
    ],

];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '2069533506639361',
        'client_secret' => '0fb04fe3e72b46ec838fbf3e26d807d7',
        'redirect' => 'http://localhost:8000/admin/',
    ],
    'google' => [ 
            'client_id' => env ( 'G+_CLIENT_ID' ),
            'client_secret' => env ( 'G+_CLIENT_SECRET' ),
            'redirect' => env ( 'G+_REDIRECT' ) 
    ],

];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '271640907402-gc8f43c089jts6d1f2mk9ncqv85eu7ci.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/google/callback'
    ],

    'facebook' => [
        'client_id' => '435722998665209',
        'client_secret' => '794d14b33bb0aea74b49365b3e911386',
        'redirect' => 'http://localhost:8000/callback',
    ],

];

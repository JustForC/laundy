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

    'firebase' => [
        'api_key' => 'AIzaSyCIiElD0gPgTUssg22NIEQoFSyQfhXspYc',
        'auth_domain' => 'deekey-api.firebaseapp.com',
        'database_url' => 'https://deekey-api.firebaseio.com',
        'project_id' => 'deekey-api',
        'storage_bucket' => 'deekey-api.appspot.com',
        'messaging_sender_id' => '651943227260',
        'app_id' => '1:651943227260:web:2819990287d9a6e77a3ef9',
        'measurement_id' => 'G-KSFW98LWFY',
    ],

];

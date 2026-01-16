<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Midtrans Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for Midtrans payment gateway integration.
    |
    */

    'server_key' => env('MIDTRANS_SERVER_KEY', ''),
    'client_key' => env('MIDTRANS_CLIENT_KEY', ''),
    
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),
    'is_3ds' => env('MIDTRANS_IS_3DS', true),

    // URLs for redirect after payment
    'finish_url' => env('MIDTRANS_FINISH_URL', '/payment/finish'),
    'unfinish_url' => env('MIDTRANS_UNFINISH_URL', '/payment/unfinish'),
    'error_url' => env('MIDTRANS_ERROR_URL', '/payment/error'),

    // Notification URL (webhook)
    'notification_url' => env('MIDTRANS_NOTIFICATION_URL', '/payment/notification'),
];

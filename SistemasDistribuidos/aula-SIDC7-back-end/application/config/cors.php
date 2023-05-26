<?php
defined('BASEPATH') || exit('No direct script access allowed');

$config['cors'] = [
    /*
    |--------------------------------------------------------------------------
    | Allowed HTTP methods
    |--------------------------------------------------------------------------
    |
    | The allowed HTTP methods for CORS requests. The `*` wildcard
    | can be used to allow all methods.
    |
    */
    'allowed_methods' => ['GET', 'POST', 'OPTIONS'],

    /*
    |--------------------------------------------------------------------------
    | Allowed request headers
    |--------------------------------------------------------------------------
    |
    | The allowed HTTP headers for CORS requests. The `*` wildcard
    | can be used to allow all headers.
    |
    */
    'allowed_headers' => ['Content-Type', 'Authorization'],

    /*
    |--------------------------------------------------------------------------
    | Allowed origins
    |--------------------------------------------------------------------------
    |
    | The allowed origins for CORS requests. The `*` wildcard can be used
    | to allow all origins. You can also specify specific domains like
    | `https://example.com`.
    |
    */
    'allowed_origins' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed request origins
    |--------------------------------------------------------------------------
    |
    | The allowed request origins for CORS requests. This can be set to `*`
    | to allow all request origins.
    |
    */
    'allowed_request_origins' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allow credentials
    |--------------------------------------------------------------------------
    |
    | Indicates whether the request can include user credentials like
    | cookies, HTTP authentication, or client-side SSL certificates.
    |
    */
    'allow_credentials' => true,

    /*
    |--------------------------------------------------------------------------
    | Exposed headers
    |--------------------------------------------------------------------------
    |
    | The headers that are allowed to be exposed to the web server.
    |
    */
    'exposed_headers' => [],
];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Options
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for handling Cross-Origin Resource
    | Sharing (CORS). By default, Laravel will allow all origins, methods, and
    | headers. You may customize this behavior as needed.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Allow CORS for API and Sanctum routes

    'allowed_methods' => ['*'], // Allow all methods

    'allowed_origins' => [
        'http://localhost:5173', // Your frontend URL
        '*', // This will allow all origins, but for production, be more specific
    ],

    'allowed_headers' => ['*'], // Allow all headers

    'exposed_headers' => [], // Expose specific headers if necessary

    'max_age' => 3600, // Cache for preflight requests

    'supports_credentials' => true, // Enable credentials support (cookies/tokens)

];

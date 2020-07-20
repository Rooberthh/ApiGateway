<?php
    return [
        'books' => [
            'base_uri' => env('APP_BOOKS_SERVICE_BASE_URL'),
            'secret' => env('APP_BOOKS_SERVICE_SECRET')
        ],
        'calendar' => [
            'base_uri' => env('APP_CALENDAR_SERVICE_BASE_URL'),
            'secret' => env('APP_BOOKS_SERVICE_SECRET')
        ],
        'task' => [
            'base_uri' => env('APP_TASK_SERVICE_BASE_URL'),
            'secret' => env('APP_TASK_SERVICE_SECRET')
        ],
        'passport' => [
            'client_id' => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'login_endpoint' => env('PASSPORT_CLIENT_ENDPOINT')
        ]
    ];

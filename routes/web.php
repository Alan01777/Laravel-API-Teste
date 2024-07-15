<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

Route::get('/redis', function () {
    Redis::set('test', 'Hello, Redis!');

    $value = Redis::get('test');

    return $value; // Should return 'Hello, Redis!'
});

require __DIR__ . '/auth.php';

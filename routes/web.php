<?php
// laravel-istanbul/package-development/routes/web.php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


//Route::get('/', [\webkurcom\alert\Http\Controllers\PostController::class, 'index']);


Route::prefix('posts')->group(function () {
    Route::get('all', [\webkurcom\alert\Http\Controllers\PostController::class, 'index']);
});

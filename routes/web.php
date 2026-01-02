<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/hola', function () {
    return 'Hola, Laravel desde cero';
});
Route::get('/posts', [PostController::class, 'index']);

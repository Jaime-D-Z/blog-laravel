<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index']);      // Listar todos
Route::post('/posts', [PostController::class, 'store']);     // Crear
Route::get('/posts/{id}', [PostController::class, 'show']);  // <--- ¡AÑADE ESTA LÍNEA!
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);

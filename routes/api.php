<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/posts', [PostController::class, 'index']);      // Listar todos
Route::post('/posts', [PostController::class, 'store']);     // Crear
Route::get('/posts/{id}', [PostController::class, 'show']);  // <--- ¡AÑADE ESTA LÍNEA!
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);
Route::get('/users/{id}/posts', function ($id) {
    $user = User::findOrFail($id);
    return $user->posts;
});
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
});

<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/token', [AuthController::class, 'token']);

Route::post('/users', [UserController::class, 'addUser']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/users/{id}', [UserController::class, 'getUserById']);
    Route::get('/users/{id}/{env}', [UserController::class, 'switchEnvironment']);

    Route::post('/articles', [ArticleController::class, 'addArticle']);
});

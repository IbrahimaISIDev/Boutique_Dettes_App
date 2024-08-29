<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\DetteController;
use App\Http\Controllers\API\AuthController;


// Routes d'authentification
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('register', [AuthController::class, 'register'])->name('register');

// Routes publiques pour la création
Route::post('users', [UserController::class, 'store']);
Route::post('clients', [ClientController::class, 'store']);

// Routes protégées par middleware
Route::middleware('auth:api')->group(function () {

    // Routes pour les utilisateurs
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);

    // Routes pour les clients
    Route::get('clients', [ClientController::class, 'index']);
    Route::get('clients/{id}', [ClientController::class, 'show']);
    Route::post('clients', [ClientController::class, 'store']);
    Route::put('clients/{id}', [ClientController::class, 'update']);
    Route::delete('clients/{id}', [ClientController::class, 'destroy']);

    // Routes pour les articles
    Route::post('articles', [ArticleController::class, 'store']);
    Route::get('articles', [ArticleController::class, 'index']);
    Route::get('articles/{id}', [ArticleController::class, 'show']);
    Route::put('articles/{id}', [ArticleController::class, 'update']);
    Route::delete('articles/{id}', [ArticleController::class, 'destroy']);

    // Routes pour les dettes
    Route::post('dettes', [DetteController::class, 'store']);
    Route::get('dettes', [DetteController::class, 'index']);
    Route::get('dettes/{id}', [DetteController::class, 'show']);
    Route::put('dettes/{id}', [DetteController::class, 'update']);
    Route::delete('dettes/{id}', [DetteController::class, 'destroy']);
});




// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\UserController;
// use App\Http\Controllers\API\ClientController;
// use App\Http\Controllers\API\ArticleController;
// use App\Http\Controllers\API\DetteController;
// use App\Http\Controllers\API\AuthController;


// Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [AuthController::class, 'logout']);
// Route::post('register', [AuthController::class, 'register']);


// Route::post('users', [UserController::class, 'store']);
// Route::post('clients', [ClientController::class, 'store']);
// Route::middleware('auth:api')->group(function () {
//     Route::apiResource('users', UserController::class);
//     Route::apiResource('clients', ClientController::class);
//     Route::apiResource('articles', ArticleController::class);
//     Route::apiResource('dettes', DetteController::class);
// });




// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\UserController;
// use App\Http\Controllers\API\ClientController;
// use App\Http\Controllers\API\ArticleController;
// use App\Http\Controllers\API\DetteController;

// Route::middleware('auth:api')->group(function () {
//     Route::apiResource('users', UserController::class);
//     Route::apiResource('clients', ClientController::class);
//     Route::apiResource('articles', ArticleController::class);
//     Route::apiResource('dettes', DetteController::class);
// });

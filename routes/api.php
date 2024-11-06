<?php

use App\Http\Controllers\Api\SheepController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/get-user', [UserController::class, 'getUser']);
    
    Route::get('/sheep', [SheepController::class, 'index']);
    Route::get('/sheep/{id}', [SheepController::class, 'show']);
    Route::post('/sheep/store', [SheepController::class, 'store']);

    Route::post('/logout', [UserController::class, 'logout']);
});
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SheepController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('/sheep', SheepController::class);
Route::get('/assessment', function () {
    return view('pages.assessment.assessment');
});
Route::get('/vital-sign', function () {
    return view('pages.vital-sign.vital');
});
Route::get('/radiology', function () {
    return view('pages.radiology.radiology');
});
Route::get('/user', function () {
    return view('pages.user.user');
});
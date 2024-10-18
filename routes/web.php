<?php

use App\Http\Controllers\AuthController;
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

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});
Route::get('/sheep', function () {
    return view('pages.domba');
});
Route::get('/assessment', function () {
    return view('pages.assessment');
});
Route::get('/vital-sign', function () {
    return view('pages.vital');
});
Route::get('/radiology', function () {
    return view('pages.radiology');
});
Route::get('/user', function () {
    return view('pages.user');
});
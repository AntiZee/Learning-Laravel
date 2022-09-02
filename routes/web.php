<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StudentMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('/template', 'template');
Route::controller(AdminController::class)->group(function () {
    Route::get('/login', 'login')->middleware([AdminMiddleware::class]);
    Route::post('/login', 'doLogin')->middleware([AdminMiddleware::class]);
    Route::get('/logout', 'doLogout')->middleware([AdminMiddleware::class]);
});
Route::controller(StudentController::class)->group(function () {
    Route::get('/login', 'login')->middleware([StudentMiddleware::class]);
    Route::post('/login', 'doLogin')->middleware([StudentMiddleware::class]);
    Route::get('/logout', 'doLogout')->middleware([StudentMiddleware::class]);
});
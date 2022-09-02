<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\todolistController;
use App\Http\Middleware\OnlyAdminMiddleware;
use App\Http\Middleware\OnlyStudentMiddleware;
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

Route::get('/', [HomeController::class, 'home']);
Route::view('/template', 'template');
Route::controller(App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/login', 'login')->middleware([OnlyStudentMiddleware::class]);
    Route::post('/login', 'doLogin')->middleware([OnlyStudentMiddleware::class]);
    Route::get('/logout', 'doLogout ')->middleware([OnlyAdminMiddleware::class]);
});
Route::controller(todolistController::class)->middleware(OnlyAdminMiddleware::class)->group(function () {
    Route::get('/todolist', 'todolist');
    Route::post('/todolist', 'addToDo');
    Route::post('/todolist/{id}/delete', 'removeToDo');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthManagerController;

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
Route::get('/', [HomeController::class, 'index']);
Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('isLoggedIn');

Route::get('/login', [AuthManagerController::class, 'login'])->name('login')->middleware('alreadyLoggedIn');
Route::post('/login', [AuthManagerController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthManagerController::class, 'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('/register', [AuthManagerController::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManagerController::class, 'logout'])->name('logout');
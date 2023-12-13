<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/log')->group(function() {
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/registerAction', [AuthController::class, 'registerAction'])->name('registerAction');

    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/loginAction', [AuthController::class, 'loginAction'])->name('loginAction');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/task')->group(function() {
    Route::get('/addTask', [TaskController::class, 'create'])->name('addTask');
    Route::post('/addTaskAction', [TaskController::class, 'createAction'])->name('addTaskAction');

    Route::get('/show', [TaskController::class, 'show'])->name('show');
    Route::get('/delete/{id}', [TaskController::class, 'delete'])->name('delete');
});
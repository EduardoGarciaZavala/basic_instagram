<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('main');
})->name('home');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/login', function () {
    return view('main');
})->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/register', [AuthController::class, 'create'])->name('register.create');
Route::get('/register/help', [AuthController::class, 'help'])->name('register.help');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/dashboard', [DashboardController::class, 'create'])->name('dashboard.index');
Route::get('/profile', [ProfileController::class, 'create'])->name('profile');
Route::get('/post/{user:username}', [PostController::class, 'create'])->name('post');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/test-locale', function () {
    return [
        'locale'       => app()->getLocale(),
        'lang_path'    => lang_path('es/validation.php'),
        'file_exists'  => file_exists(lang_path('es/validation.php')),
    ];
});

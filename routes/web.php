<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostsController::class, 'index']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/', [PostsController::class, 'index']);
// });


// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });

Route::get('/publish', function () {
    return view('publish');
});

Route::get('/edit-post/{id}', [PostsController::class, 'edit'])->name('edit-post');
Route::post('/edit-post/{id}', [PostsController::class, 'update'])->name('update-post');

Route::post('/publish', [PostsController::class, 'publish'])->name('publish');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

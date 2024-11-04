<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;

//homepage
Route::get('/', [PostsController::class, 'index']);

//Publish page
Route::get('/publish', function () {
    return view('publish');
});
Route::post('/publish', [PostsController::class, 'publish'])->name('publish');

//edit post 
Route::get('/edit-post/{id}', [PostsController::class, 'edit'])->name('edit-post');
Route::post('/edit-post/{id}', [PostsController::class, 'update'])->name('update-post');

//register 
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//login 
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

//logout post
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

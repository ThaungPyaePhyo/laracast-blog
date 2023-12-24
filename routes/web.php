<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post}', [PostController::class, 'show']);
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');
Route::get('login',[SessionController::class,'create'])->middleware('guest');
Route::post('login',[SessionController::class,'store'])->middleware('guest');
Route::post('logout',[SessionController::class, 'destroy'])->middleware('auth');

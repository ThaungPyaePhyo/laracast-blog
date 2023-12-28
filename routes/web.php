<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades\Route;

Route::post('newsletter', function (MailchimpNewsletter $newsletter) {

});
Route::post('newsletter',NewsletterController::class);
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post}', [PostController::class, 'show']);
Route::post('posts/{post}/comments',[CommentController::class,'store']);
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');
Route::get('login',[SessionController::class,'create'])->middleware('guest');
Route::post('login',[SessionController::class,'store'])->middleware('guest');
Route::post('logout',[SessionController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create',[PostController::class, 'create'])->middleware('admin');

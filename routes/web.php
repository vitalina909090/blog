<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/comments', [CommentController::class, 'index'])
    ->name('comments.index');

Route::get('/comments/{comment}', [CommentController::class, 'show'])
    ->name('comments.show');

Route::post('/orders', [OrderController::class, 'process'])
    ->name('orders.process');

<?php

use App\Http\Controllers\api\LoginAPIController;
use App\Http\Controllers\api\PostAPIController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::resource('post', PostAPIController::class);
Route::get('post', [PostAPIController::class, 'index'])->name('post.index');
Route::post('/login', [LoginAPIController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('post/{id}', [PostAPIController::class, 'show'])->name('post.show');
    Route::post('post', [PostAPIController::class, 'store'])->name('post.store');
    Route::post('/post/storelike/{id}', [PostAPIController::class, 'storeLike'])->name('post.storelike');
    Route::post('/post/postcomment/{id}', [PostAPIController::class, 'postComment'])->name('post.storecomment');
    Route::get('/post/mypost/{id}', [PostAPIController::class, 'getMyPost'])->name('post.getmypost');
    Route::post('/me', [LoginAPIController::class, 'me']);
    Route::post('/logout', [LoginAPIController::class, 'logout']);
});

<?php

use App\Http\Controllers\api\PostAPIController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('post', PostAPIController::class);

<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);

Route::resource('posts', PostController::class);

Route::get('/notifications', [NotificationController::class, 'index']);

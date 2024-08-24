<?php

use App\Http\Controllers\AutobotController; 
use Illuminate\Support\Facades\Route;


Route::get('/autobots/count', [AutobotController::class, 'count']);
Route::get('/autobots', [AutobotController::class, 'index']);
Route::get('/autobots/{autobot}/posts', [AutobotController::class, 'posts']);
Route::get('/posts/{post}/comments', [AutobotController::class, 'comments']);

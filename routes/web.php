<?php
use App\Http\Controllers\LogViewerController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logs', [LogViewerController::class, 'index']);

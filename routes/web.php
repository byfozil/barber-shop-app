<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::post('/', [MainController::class, 'book'])->name('book');
Route::get('/available-times', [MainController::class, 'getAvailableTimes']);

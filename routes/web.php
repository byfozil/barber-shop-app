<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::post('/', [MainController::class, 'book'])->name('book');
Route::get('/available-times', [MainController::class, 'getAvailableTimes']);

Route::get('/panel/login', [PanelController::class, 'login'])->name('login')->middleware('guest');
Route::post('/panel/login', [PanelController::class, 'login_post'])->name('login_post')->middleware('guest');
Route::get('/panel/logout', [PanelController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/panel', [PanelController::class, 'panel'])->name('panel')->middleware('auth');
Route::get('/panel/barbers', [PanelController::class, 'barbers'])->name('barbers')->middleware('auth');
Route::get('/panel/prices', [PanelController::class, 'prices'])->name('prices')->middleware('auth');
Route::get('/panel/testimonials', [PanelController::class, 'testimonials'])->name('testimonials')->middleware('auth');
Route::get('/panel/clients', [PanelController::class, 'clients'])->name('clients')->middleware('auth');

<?php

use App\Http\Controllers\BarberController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

// Main Routes
Route::get('/', [MainController::class, 'index'])->name('index');
Route::post('/', [MainController::class, 'book'])->name('book');
Route::get('/available-times', [MainController::class, 'getAvailableTimes']);

// Auth Routes
Route::get('/panel/login', [PanelController::class, 'login'])->name('login')->middleware('guest');
Route::post('/panel/login', [PanelController::class, 'login_post'])->name('login_post')->middleware('guest');
Route::get('/panel/logout', [PanelController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Panel Routes
Route::get('/panel', [PanelController::class, 'panel'])->name('panel')->middleware('auth');
Route::get('/panel/barbers', [PanelController::class, 'barbers'])->name('barbers')->middleware('auth');
Route::get('/panel/prices', [PanelController::class, 'prices'])->name('prices')->middleware('auth');
Route::get('/panel/testimonials', [PanelController::class, 'testimonials'])->name('testimonials')->middleware('auth');
Route::get('/panel/clients', [PanelController::class, 'clients'])->name('clients')->middleware('auth');

// Control Barbers Routes
Route::get('/panel/barbers/add', [BarberController::class, 'barber_add'])->name('barber_add')->middleware('auth');
Route::post('/panel/barbers/add', [BarberController::class, 'barber_add_post'])->name('barber_add_post')->middleware('auth');
Route::get('/panel/barbers/edit/{id}', [BarberController::class, 'barber_edit'])->name('barber_edit')->middleware('auth');
Route::put('/panel/barbers/edit', [BarberController::class, 'barber_edit_put'])->name('barber_edit_put')->middleware('auth');
Route::get('/panel/barbers/delete/{id}', [BarberController::class, 'barber_delete'])->name('barber_delete')->middleware('auth');
Route::delete('/panel/barbers/delete', [BarberController::class, 'barber_delete_delete'])->name('barber_delete_delete')->middleware('auth');

// Control Prices Routes
Route::get('/panel/prices/add', [PriceController::class, 'price_add'])->name('price_add')->middleware('auth');
Route::post('/panel/prices/add', [PriceController::class, 'price_add_post'])->name('price_add_post')->middleware('auth');
Route::get('/panel/prices/edit/{id}', [PriceController::class, 'price_edit'])->name('price_edit')->middleware('auth');
Route::put('/panel/prices/edit', [PriceController::class, 'price_edit_put'])->name('price_edit_put')->middleware('auth');
Route::get('/panel/prices/delete/{id}', [PriceController::class, 'price_delete'])->name('price_delete')->middleware('auth');
Route::delete('/panel/prices/delete', [PriceController::class, 'price_delete_delete'])->name('price_delete_delete')->middleware('auth');

// Control Testimonials Routes
Route::get('/panel/testimonials/add', [TestimonialController::class, 'testimonial_add'])->name('testimonial_add')->middleware('auth');
Route::post('/panel/testimonials/add', [TestimonialController::class, 'testimonial_add_post'])->name('testimonial_add_post')->middleware('auth');
Route::get('/panel/testimonials/edit/{id}', [TestimonialController::class, 'testimonial_edit'])->name('testimonial_edit')->middleware('auth');
Route::put('/panel/testimonials/edit', [TestimonialController::class, 'testimonial_edit_put'])->name('testimonial_edit_put')->middleware('auth');
Route::get('/panel/testimonials/delete/{id}', [TestimonialController::class, 'testimonial_delete'])->name('testimonial_delete')->middleware('auth');
Route::delete('/panel/testimonials/delete', [TestimonialController::class, 'testimonial_delete_delete'])->name('testimonial_delete_delete')->middleware('auth');

// Control Clients Routes
Route::get('/panel/clients/status/{id}', [ClientController::class, 'client_status'])->name('client_status')->middleware('auth');
Route::put('/panel/clients/status', [ClientController::class, 'client_status_put'])->name('client_status_put')->middleware('auth');

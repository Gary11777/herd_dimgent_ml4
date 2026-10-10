<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::inertia('/products', 'Products')->name('products');
Route::inertia('/services', 'Services')->name('services');
Route::inertia('/projects', 'Projects')->name('projects');
Route::inertia('/contacts', 'Contacts')->name('contacts');
Route::inertia('/about', 'About')->name('about');

Route::post('/contacts', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contacts.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

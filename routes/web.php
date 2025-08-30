<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// File: routes/web.php
Route::get('/reviews', function () {
    return view('reviews');
});

Route::get("/menu", function () {
    return view('menu');
});

Route::get("/about", function () {
    return view('about');
})->name('about');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store']);
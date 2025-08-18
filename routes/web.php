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
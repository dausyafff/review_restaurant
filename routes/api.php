<?php

use App\Http\Controllers\API\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/reviews", [ReviewController::class, 'index'])
    ->name('reviews.index');
Route::post("/reviews", [ReviewController::class, 'store'])
    ->name('reviews.store');

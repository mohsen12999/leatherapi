<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ButcherController;
use App\Http\Controllers\Api\LeatherController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('butchers', ButcherController::class);
Route::apiResource('leathers', LeatherController::class);

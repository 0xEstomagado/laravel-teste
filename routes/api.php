<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('product', [ProductController::class, 'index']);
Route::get('product/{id}', [ProductController::class, 'show']);
Route::post('product', [ProductController::class, 'store']);
Route::put('product/{id}', [ProductController::class, 'update']);
Route::delete('product/{id}', [ProductController::class, 'destroy']);
Route::get('/weather-forecast', function (Request $request) {

    $lat = $request->query('lat');
    $long = $request->query('long');

    return Http::withoutVerifying()->get("https://weather.contrateumdev.com.br/api/weather?lat=" . $lat .  "&lon=" . $long);
});
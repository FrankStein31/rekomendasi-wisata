<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/weights', [WeightController::class, 'index']);
Route::get('/weights/{id}', [WeightController::class, 'show']);
Route::post('/weights', [WeightController::class, 'store']);
Route::put('/weights/{id}', [WeightController::class, 'update']);
Route::delete('/weights/{id}', [WeightController::class, 'destroy']);
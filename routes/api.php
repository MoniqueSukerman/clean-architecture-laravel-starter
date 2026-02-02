<?php

use App\Infrastructure\Http\Controllers\Task\DeleteController;
use App\Infrastructure\Http\Controllers\Task\FindAllController;
use App\Infrastructure\Http\Controllers\Task\FindController;
use App\Infrastructure\Http\Controllers\Task\UpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Infrastructure\Http\Controllers\Task\CreateController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/task', CreateController::class);
Route::put('/task/{id}', UpdateController::class);
Route::delete('/task/{id}', DeleteController::class);
Route::get('/task/{id}', FindController::class);
Route::get('/task', FindAllController::class);

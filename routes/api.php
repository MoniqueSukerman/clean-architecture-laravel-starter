<?php

use App\Infrastructure\Http\Controllers\Task\DeleteTaskController;
use App\Infrastructure\Http\Controllers\Task\FindAllTasksController;
use App\Infrastructure\Http\Controllers\Task\FindTaskController;
use App\Infrastructure\Http\Controllers\Task\UpdateTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Infrastructure\Http\Controllers\Task\CreateTaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/task', CreateTaskController::class);
Route::put('/task/{id}', UpdateTaskController::class);
Route::delete('/task/{id}', DeleteTaskController::class);
Route::get('/task/{id}', FindTaskController::class);
Route::get('/task', FindAllTasksController::class);

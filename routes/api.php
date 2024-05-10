<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/todos', [App\Http\Controllers\Api\ApiTodoController::class,'index']);
Route::post('/todos', [App\Http\Controllers\Api\ApiTodoController::class,'store']);
Route::put('/todos/{id}', [App\Http\Controllers\Api\ApiTodoController::class,'update']);
Route::get('/todos/{id}', [App\Http\Controllers\Api\ApiTodoController::class,'show']);
Route::delete('/todos/{id}', [App\Http\Controllers\Api\ApiTodoController::class,'destroy']);

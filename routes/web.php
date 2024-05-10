<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/login');
});

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::get('/edit-todo/{id?}', [App\Http\Controllers\TodoController::class, 'editTodo'])->name('EditTodo');
Route::get('/view-todo', [App\Http\Controllers\TodoController::class, 'index'])->name('view-todo');



Route::post('/create-or-update-todo/{id?}', [App\Http\Controllers\TodoController::class, 'createOrUpdateTodo'])->name('createOrUpdateTodo');
Route::post('/delete-todo/{todo}', [App\Http\Controllers\TodoController::class, 'DeleteTodo'])->name('deleteTodo');

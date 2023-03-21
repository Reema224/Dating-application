<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
});


Route::get('/profiless/{profile}', [ProfileController::class, 'show']);
Route::post('/profiless', [ProfileController::class, 'store']);



Route::get('/users/filter', [UserController::class, 'getByAgeAndLocation']);
Route::get('/profiles/filter', [ProfileController::class, 'getByAgeAndLocation']);

Route::get('/users/search', [UserController::class, 'searchByName']);

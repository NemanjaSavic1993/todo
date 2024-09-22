<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('welcome');
});


Route::resource('/tasks',TaskController::class);
Route::resource('/users',UsersController::class);

Route::get('/user/{user}/tasks',[UsersController::class, 'tasks']);

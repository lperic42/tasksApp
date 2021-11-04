<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TasksController;


// Routes that handle registration data saving into databases
Route::post('/save', [MainController::class, 'save'])->name('save');
Route::post('/check', [MainController::class, 'check'])->name('check');

// Logging out
Route::get('/logout', [MainController::class, 'logOut' ])->name('logOut');

// Routes that handle logging in, registration and dashboard validations
Route::group(['middleware' => ['AuthCheck']], function(){        
    // Login and register views
    Route::view('/', 'auth.login');
    Route::view('/register', 'auth.register');

    // Dashboard with Admin info
    Route::get('/dashboard',[MainController::class, 'dashboard']);

    // Tasks routes
    Route::get('/tasks', [TasksController::class, 'listTasks'])->name('tasks');
    Route::view('/tasks/create', 'tasks.create')->name('create');
    Route::post('/tasks/create', [TasksController::class, 'storeTask'])->name('store');
    Route::put('/task/{id}', [TasksController::class, 'finishTask'])->name('finish');
    Route::delete('/task/{id}', [TasksController::class, 'deleteTask'])->name('delete');
});










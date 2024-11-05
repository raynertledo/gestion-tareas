<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta de recursos para las tareas
Route::resource('tasks', TaskController::class);
Route::patch('tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');


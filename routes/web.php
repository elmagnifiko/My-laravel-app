<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

// Redirection de la racine vers la liste des tâches
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Exemple de route simple
Route::get('/hello', [HelloController::class, 'index']);

// Routes pour les tâches
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes pour les tâches
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::patch('tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
Route::resource('tasks', TaskController::class);

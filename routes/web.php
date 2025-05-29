<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Bonjour Laravel !';
});

use App\Http\Controllers\HelloController;

Route::get('/hello', [HelloController::class, 'index']);

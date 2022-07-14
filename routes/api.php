<?php
use elbaz\Http\Route;
use App\Controllers\HomeController;

Route::get('/products', [HomeController::class, 'index']);

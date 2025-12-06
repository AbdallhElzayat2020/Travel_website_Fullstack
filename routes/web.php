<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');



require __DIR__ . '/auth.php';

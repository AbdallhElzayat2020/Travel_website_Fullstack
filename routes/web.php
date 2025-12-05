<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\Website\HomeController::class,'index'])->name('home');



require __DIR__.'/auth.php';

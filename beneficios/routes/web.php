<?php

use App\Http\Controllers\BeneficioController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BeneficioController::class, 'index']);

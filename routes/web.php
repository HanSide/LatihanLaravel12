<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;


Route::get('/profile', [ProfilController::class, 'showProfile']);
Route::get('/contact', [ProfilController::class, 'showContact']);
Route::get('/', [ProfilController::class, 'index']);



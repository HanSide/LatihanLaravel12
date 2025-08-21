<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;


Route::get('/profil', [ProfilController::class, 'showProfile']);
Route::get('/contact', [ProfilController::class, 'showContact']);
Route::get('/', [ProfilController::class, 'index']);


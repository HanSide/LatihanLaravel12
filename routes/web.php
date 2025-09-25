<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ContactController;


Route::get('/profile', [ProfilController::class, 'index'])->name('profile',['title' => "Profile"]);
Route::get('/contact', [ContactController::class, 'index'])->name('contact',['title' => "Contact"]);
Route::get('/home', [HomeController::class, 'index'])->name('home',['title' => "Home"]);
Route::get('/student', [StudentController::class, 'index'])->name('student',['title' => "Student"]);
Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian',['title' => "Guardian"]);



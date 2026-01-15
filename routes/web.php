<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\GuardianController as AdminGuardianController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\SubjectController as AdminSubjectController;
use App\Http\Controllers\Admin\ClassroomController as AdminClassroomController;
use App\Http\Controllers\AuthController;


Route::get('/profile', [ProfilController::class, 'index'])->name('profile',['title' => "Profile"]);
Route::get('/contact', [ContactController::class, 'index'])->name('contact',['title' => "Contact"]);
Route::get('/', [HomeController::class, 'index'])->name('home',['title' => "Home"]);
Route::get('/student', [StudentController::class, 'index'])->name('student',['title' => "Student"]);
Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian',['title' => "Guardian"]);
Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom',['title' => "Classroom"]);
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher',['title' => "Teacher"]);
Route::get('/subject', [SubjectController::class, 'index'])->name('subject',['title' => "Subject"]);
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('adminstudent', AdminStudentController::class);
Route::resource('adminteacher', AdminTeacherController::class);
Route::resource('adminsubject', AdminSubjectController::class);
Route::resource('adminclassroom', AdminClassroomController::class);
Route::resource('adminguardian', AdminGuardianController::class);
});


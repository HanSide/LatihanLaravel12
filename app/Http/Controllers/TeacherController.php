<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index()
{
    $title = 'Teachers';
    $teachers = Teacher::all();
    return view('guru', ['title' => $title, 'teachers' => $teachers]);
}
}

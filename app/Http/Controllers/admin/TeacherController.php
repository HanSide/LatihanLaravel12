<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
   public function index()
{
    $title = 'Teachers';
    $teachers = Teacher::all();
    return view('adminteacher', ['title' => $title, 'teachers' => $teachers]);
}
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
        public function index()
    {
        $classrooms = Classroom::all();
        $title = 'Classroom';
        return view('adminclassroom', ['title' => $title ,'classrooms' => $classrooms]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        $title = 'Classroom';
        return view('classroom', ['title' => $title ,'classrooms' => $classrooms]);
    }
    
}

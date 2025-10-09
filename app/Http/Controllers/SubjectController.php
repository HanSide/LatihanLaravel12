<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //
    public function index(){
        $title = 'Subject';
        $subjects = Subject::all();
        return view('matapelajaran', ['title' => $title, 'subjects' => $subjects]);
    }
}

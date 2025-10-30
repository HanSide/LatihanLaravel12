<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
        public function index(){
        $title = 'Subject';
        $subjects = Subject::all();
        return view('adminsubject', ['title' => $title, 'subjects' => $subjects]);
}
}
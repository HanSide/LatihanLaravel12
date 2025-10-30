<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guardian;

class GuardianController extends Controller
{
 public function index()
    {
        $guardians = Guardian::all();
        $title = 'Guardian';
        return view('adminguardian', ['title' => $title , 'guardians' => $guardians]);
    }
}

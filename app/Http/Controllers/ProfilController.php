<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $name = 'Muhammad Rayhan Aulia';
        $class = '11 PPLG 2';
        $major = 'PPLG';
        $title = 'Profile';
        return view('profile', compact('name', 'class', 'major', 'title'));
    }
}

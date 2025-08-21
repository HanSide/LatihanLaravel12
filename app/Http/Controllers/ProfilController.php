<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('beranda');
    }
    public function showProfile()
    {
        $name = 'Muhammad Rayhan Aulia';
        $class = '11 PPLG 2';
        $major = 'PPLG';

        return view('profile', compact('name', 'class', 'major'));
    }
    public function ShowContact()
    {
        return view('kontak');
    }
}

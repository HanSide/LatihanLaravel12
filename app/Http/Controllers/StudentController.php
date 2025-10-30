<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $title = 'Student';
    // $students = [
    //     [
    //         'id' => '1',
    //         'name' => 'Faiz',
    //         'grade' => '11 RPL 2',
    //         'email' => 'faizgamerz01@gmail.com',
    //         'address' => 'PATI',
    //     ],
    //     [
    //         'id' => '2',
    //         'name' => 'Alya',
    //         'grade' => '11 RPL 1',
    //         'email' => 'alya@gmail.com',
    //         'address' => 'KUDUS',
    //     ],
    //     [
    //         'id' => '3', 
    //         'name' => 'klontang',
    //         'grade' => '11 RPL 3',
    //         'email' => 'klontag@hotmail.com',
    //         'address' => 'JEPARA',
    //     ],
    //     [
    //         'id' => '4',
    //         'name' => 'henry',
    //         'grade' => '11 RPL 2',
    //         'email' => 'henry@gmail.com',
    //         'address' => 'tangerang',
    //     ],
    //     [
    //         'id' => '5',
    //         'name' => 'arsya',
    //         'grade' => '11 RPL 1',
    //         'email' => 'arsya@gmail.com',
    //         'address' => 'SEMARANG',
    //     ]
    // ];

    $students = Student::all();
    return view('siswa', ['title' => $title, 'students' => $students]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

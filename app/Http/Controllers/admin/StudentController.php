<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class StudentController extends Controller
{
    public function index(){
        $title = 'Student';
        $students = Student::all();
        $classrooms = Classroom::all();
        return view('adminstudent', compact('title', 'students', 'classrooms'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'birthday' => 'required|date'
        ]);

        Student::create($validated);

        return redirect()->route('adminstudent.index')->with('success', 'Student added successfully!');
    }

    public function update(Request $request, Student $adminstudent){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'email' => 'required|email|unique:students,email,' . $adminstudent->id,
            'address' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'birthday' => 'required|date'
        ]);

        $adminstudent->name = $validated['name'];
        $adminstudent->classroom_id = $validated['classroom_id'];
        $adminstudent->email = $validated['email'];
        $adminstudent->address = $validated['address'];
        $adminstudent->gender = $validated['gender'];
        $adminstudent->birthday = $validated['birthday'];
        $adminstudent->save();

        return redirect()->route('adminstudent.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $adminstudent){
        $adminstudent->delete();
        
        return redirect()->route('adminstudent.index')->with('success', 'Student deleted successfully!');
    }
}
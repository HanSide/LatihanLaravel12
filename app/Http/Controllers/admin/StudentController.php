<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class StudentController extends Controller
{
    public function index(Request $request) {
    $title = 'Student';

    $query = Student::query();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%")
              ->orWhereHas('classroom', function ($q) use ($search) {
                  $q->where('name', 'like', "%$search%");
              });
    }

    $students = $query->paginate(5)->withQueryString();
    $classrooms = Classroom::all();

    return view('adminstudent', compact('title', 'students', 'classrooms'));
}


    public function update(Request $request, $id) {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'email' => 'required|email|unique:students,email,' . $id,
        ]);

        $student->update($validated);

        return redirect()->route('adminstudent.index')->with('success', 'Student updated successfully!');
    }
    
    public function destroy(Student $adminstudent) {
        $adminstudent->delete();

        return redirect()->route('adminstudent.index')->with('success', 'Student deleted successfully!');
    }
}
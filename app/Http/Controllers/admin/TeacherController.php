<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;

class TeacherController extends Controller
{
public function index(Request $request)
{
    $title = 'Teachers';

    $query = Teacher::with('subject');

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%')
              ->orWhereHas('subject', function ($q) use ($request) {
                  $q->where('name', 'like', '%' . $request->search . '%');
              });
    }

    $teachers = $query->paginate(5)->withQueryString();
    $subjects = Subject::all();

    return view('adminteacher', compact('title', 'teachers', 'subjects'));
}



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'email' => 'required|email|unique:teachers,email',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        Teacher::create($validated);

        return redirect()->route('adminteacher.index')->with('success', 'Teacher added successfully!');
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
        ]);

        $teacher->update($validated);

        return redirect()->route('adminteacher.index')->with('success', 'Teacher updated successfully!');
    }

    public function destroy(Teacher $adminteacher)
    {
        $adminteacher->delete();

        return redirect()->route('adminteacher.index')->with('success', 'Teacher deleted successfully!');
    }
}
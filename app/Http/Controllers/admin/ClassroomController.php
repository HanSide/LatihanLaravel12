<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
public function index(Request $request)
{
    $title = 'Classroom';

    $query = Classroom::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $classrooms = $query->paginate(5)->withQueryString();

    return view('adminclassroom', compact('title', 'classrooms'));
}

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required'
    ]);

    Classroom::create([
        'name' => $request->name
    ]);

    return redirect()->back();
}

public function edit($id)
{
    $classroom = Classroom::findOrFail($id);
    return view('editclassroom', compact('classroom'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required'
    ]);

    Classroom::findOrFail($id)->update([
        'name' => $request->name
    ]);

    return redirect()->route('adminclassroom.index');
}

}

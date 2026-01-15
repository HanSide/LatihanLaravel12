<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
public function index(Request $request)
{
    $title = 'Subject';

    $query = Subject::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $subjects = $query->paginate(5)->withQueryString();

    return view('adminsubject', compact('title', 'subjects'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required'
    ]);

    Subject::create([
        'name' => $request->name
    ]);

    return redirect()->back();
}

public function edit($id)
{
    $subject = Subject::findOrFail($id);
    return view('editclassroom', compact('subject'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required'
    ]);

    Subject::findOrFail($id)->update([
        'name' => $request->name
    ]);

    return redirect()->route('adminsubject.index');
}
}
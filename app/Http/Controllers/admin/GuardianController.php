<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guardian;

class GuardianController extends Controller
{
   public function index(Request $request)
{
    $title = 'Guardian';

    $query = Guardian::query();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%")
              ->orWhere('phone', 'like', "%$search%")
              ->orWhere('job', 'like', "%$search%");
    }

    $guardians = $query->paginate(5)->withQueryString();

    return view('adminguardian', compact('title', 'guardians'));
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'job'     => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|unique:guardians,email',
            'address' => 'required|string',
            'gender'  => 'required|in:Male,Female',
        ]);

        Guardian::create($validated);

        return redirect()->route('adminguardian.index')
            ->with('success', 'Guardian added successfully!');
    }

    public function update(Request $request, $id)
    {
        $guardian = Guardian::findOrFail($id);

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'job'     => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|unique:guardians,email,' . $id,
            'address' => 'required|string',
            'gender'  => 'required|in:Male,Female',
        ]);

        $guardian->update($validated);

        return redirect()->route('adminguardian.index')
            ->with('success', 'Guardian updated successfully!');
    }

    public function destroy($id)
    {
        $guardian = Guardian::findOrFail($id);
        $guardian->delete();

        return redirect()->route('adminguardian.index')
            ->with('success', 'Guardian deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idMatakuliah' => 'required|string|max:50',
            'namaMatakuliah' => 'required|string|max:255',
        ]);

        Subject::create([
            'idMatakuliah' => $request->idMatakuliah,
            'namaMatakuliah' => $request->namaMatakuliah,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject added successfully');
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.show', compact('subject'));
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idMatakuliah' => 'required|string|max:50',
            'namaMatakuliah' => 'required|string|max:255',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update([
            'idMatakuliah' => $request->idMatakuliah,
            'namaMatakuliah' => $request->namaMatakuliah,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully');
    }
}

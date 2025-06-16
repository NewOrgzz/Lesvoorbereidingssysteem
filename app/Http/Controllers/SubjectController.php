<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('schoolYear')->orderBy('naam')->get();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $schoolYears = SchoolYear::orderBy('start_datum', 'desc')->get();
        return view('subjects.create', compact('schoolYears'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(Subject::rules(), Subject::messages());

        Subject::create($validated);

        return redirect()->route('subjects.index')
            ->with('success', 'Vak succesvol aangemaakt.');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        $schoolYears = SchoolYear::orderBy('start_datum', 'desc')->get();
        return view('subjects.edit', compact('subject', 'schoolYears'));
    }

    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate(Subject::rules(), Subject::messages());

        $subject->update($validated);

        return redirect()->route('subjects.index')
            ->with('success', 'Vak succesvol bijgewerkt.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Vak succesvol verwijderd.');
    }
} 
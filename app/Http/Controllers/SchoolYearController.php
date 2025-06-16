<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    public function index()
    {
        $schoolYears = SchoolYear::orderBy('start_datum', 'desc')->get();
        return view('school-years.index', compact('schoolYears'));
    }

    public function create()
    {
        return view('school-years.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(SchoolYear::rules(), SchoolYear::messages());

        SchoolYear::create($validated);

        return redirect()->route('school-years.index')
            ->with('success', 'Schooljaar succesvol aangemaakt.');
    }

    public function show(SchoolYear $schoolYear)
    {
        return view('school-years.show', compact('schoolYear'));
    }

    public function edit(SchoolYear $schoolYear)
    {
        return view('school-years.edit', compact('schoolYear'));
    }

    public function update(Request $request, SchoolYear $schoolYear)
    {
        $validated = $request->validate(SchoolYear::rules(), SchoolYear::messages());

        $schoolYear->update($validated);

        return redirect()->route('school-years.index')
            ->with('success', 'Schooljaar succesvol bijgewerkt.');
    }

    public function destroy(SchoolYear $schoolYear)
    {
        $schoolYear->delete();

        return redirect()->route('school-years.index')
            ->with('success', 'Schooljaar succesvol verwijderd.');
    }
} 
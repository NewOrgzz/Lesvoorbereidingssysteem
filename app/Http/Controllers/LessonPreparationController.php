<?php

namespace App\Http\Controllers;

use App\Models\LessonPreparation;
use App\Models\Subject;
use Illuminate\Http\Request;

class LessonPreparationController extends Controller
{
    public function index()
    {
        $lessonPreparations = LessonPreparation::with(['subject', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('lesson-preparations.index', compact('lessonPreparations'));
    }

    public function create()
    {
        $subjects = Subject::orderBy('naam')->get();
        return view('lesson-preparations.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(LessonPreparation::rules(), LessonPreparation::messages());
        $validated['user_id'] = auth()->id();

        LessonPreparation::create($validated);

        return redirect()->route('lesson-preparations.index')
            ->with('success', 'Lesvoorbereiding succesvol aangemaakt.');
    }

    public function show(LessonPreparation $lessonPreparation)
    {
        $lessonPreparation->load(['subject', 'user', 'versions']);
        return view('lesson-preparations.show', compact('lessonPreparation'));
    }

    public function edit(LessonPreparation $lessonPreparation)
    {
        $this->authorize('update', $lessonPreparation);
        $subjects = Subject::orderBy('naam')->get();
        return view('lesson-preparations.edit', compact('lessonPreparation', 'subjects'));
    }

    public function update(Request $request, LessonPreparation $lessonPreparation)
    {
        $this->authorize('update', $lessonPreparation);
        $validated = $request->validate(LessonPreparation::rules(), LessonPreparation::messages());

        $lessonPreparation->update($validated);

        return redirect()->route('lesson-preparations.index')
            ->with('success', 'Lesvoorbereiding succesvol bijgewerkt.');
    }

    public function destroy(LessonPreparation $lessonPreparation)
    {
        $this->authorize('delete', $lessonPreparation);
        $lessonPreparation->delete();

        return redirect()->route('lesson-preparations.index')
            ->with('success', 'Lesvoorbereiding succesvol verwijderd.');
    }
} 
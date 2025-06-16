<?php

namespace App\Http\Controllers;

use App\Models\Version;
use App\Models\LessonPreparation;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function index(LessonPreparation $lessonPreparation)
    {
        $versions = $lessonPreparation->versions()->orderBy('versie_nummer', 'desc')->get();
        return view('versions.index', compact('lessonPreparation', 'versions'));
    }

    public function create(LessonPreparation $lessonPreparation)
    {
        $this->authorize('update', $lessonPreparation);
        return view('versions.create', compact('lessonPreparation'));
    }

    public function store(Request $request, LessonPreparation $lessonPreparation)
    {
        $this->authorize('update', $lessonPreparation);
        $validated = $request->validate(Version::rules(), Version::messages());
        $validated['lesson_preparation_id'] = $lessonPreparation->id;

        Version::create($validated);

        return redirect()->route('lesson-preparations.show', $lessonPreparation)
            ->with('success', 'Versie succesvol aangemaakt.');
    }

    public function show(LessonPreparation $lessonPreparation, Version $version)
    {
        return view('versions.show', compact('lessonPreparation', 'version'));
    }

    public function edit(LessonPreparation $lessonPreparation, Version $version)
    {
        $this->authorize('update', $lessonPreparation);
        return view('versions.edit', compact('lessonPreparation', 'version'));
    }

    public function update(Request $request, LessonPreparation $lessonPreparation, Version $version)
    {
        $this->authorize('update', $lessonPreparation);
        $validated = $request->validate(Version::rules(), Version::messages());

        $version->update($validated);

        return redirect()->route('lesson-preparations.show', $lessonPreparation)
            ->with('success', 'Versie succesvol bijgewerkt.');
    }

    public function destroy(LessonPreparation $lessonPreparation, Version $version)
    {
        $this->authorize('update', $lessonPreparation);
        $version->delete();

        return redirect()->route('lesson-preparations.show', $lessonPreparation)
            ->with('success', 'Versie succesvol verwijderd.');
    }
} 
<?php

namespace App\Http\Controllers;

use App\Models\Schooljaar;
use Illuminate\Http\Request;

class SchooljarenController extends Controller
{
    public function index()
    {
        $schooljaren = Schooljaar::with('vakken')->get();
        return view('schooljaren.index', compact('schooljaren'));
    }

    public function create()
    {
        return view('schooljaren.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'start_datum' => 'required|date',
            'eind_datum' => 'required|date|after:start_datum',
        ]);

        Schooljaar::create($validated);

        return redirect()->route('schooljaren.index')
            ->with('success', 'Schooljaar is succesvol aangemaakt.');
    }

    public function show(Schooljaar $schooljaar)
    {
        return view('schooljaren.show', compact('schooljaar'));
    }

    public function edit(Schooljaar $schooljaar)
    {
        return view('schooljaren.edit', compact('schooljaar'));
    }

    public function update(Request $request, Schooljaar $schooljaar)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'start_datum' => 'required|date',
            'eind_datum' => 'required|date|after:start_datum',
        ]);

        $schooljaar->update($validated);

        return redirect()->route('schooljaren.index')
            ->with('success', 'Schooljaar is succesvol bijgewerkt.');
    }

    public function destroy(Schooljaar $schooljaar)
    {
        $schooljaar->delete();

        return redirect()->route('schooljaren.index')
            ->with('success', 'Schooljaar is succesvol verwijderd.');
    }
}
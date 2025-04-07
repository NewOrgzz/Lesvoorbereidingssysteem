<?php

namespace App\Http\Controllers;

use App\Models\Lesvoorbereiding;
use App\Models\Vak;
use Illuminate\Http\Request;

class LesvoorbereidingenController extends Controller
{
    public function index()
    {
        $lesvoorbereidingen = Lesvoorbereiding::with(['vak', 'versies'])->get();
        return view('lesvoorbereidingen.index', compact('lesvoorbereidingen'));
    }

    public function create()
    {
        $vakken = Vak::all();
        return view('lesvoorbereidingen.create', compact('vakken'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vak_id' => 'required|exists:vakken,id',
            'titel' => 'required|string|max:255',
            'datum' => 'required|date',
            'lokaal' => 'nullable|string|max:255',
            'tijd' => 'nullable|date_format:H:i',
            'groepssamenstelling' => 'nullable|string',
            'beginsituatie' => 'nullable|string',
            'leerdoelen' => 'nullable|string',
            'voorbereiding' => 'nullable|string',
            'werkvorm' => 'nullable|in:individueel,groepje,synchroon,asynchroon',
            'materiaal_type' => 'nullable|in:fysiek,online,beide',
        ]);

        Lesvoorbereiding::create($validated);

        return redirect()->route('lesvoorbereidingen.index')
            ->with('success', 'Lesvoorbereiding is succesvol aangemaakt.');
    }

    public function show(Lesvoorbereiding $lesvoorbereiding)
    {
        return view('lesvoorbereidingen.show', compact('lesvoorbereiding'));
    }

    public function edit(Lesvoorbereiding $lesvoorbereiding)
    {
        $vakken = Vak::all();
        return view('lesvoorbereidingen.edit', compact('lesvoorbereiding', 'vakken'));
    }

    public function update(Request $request, Lesvoorbereiding $lesvoorbereiding)
    {
        $validated = $request->validate([
            'vak_id' => 'required|exists:vakken,id',
            'titel' => 'required|string|max:255',
            'datum' => 'required|date',
            'lokaal' => 'nullable|string|max:255',
            'tijd' => 'nullable|date_format:H:i',
            'groepssamenstelling' => 'nullable|string',
            'beginsituatie' => 'nullable|string',
            'leerdoelen' => 'nullable|string',
            'voorbereiding' => 'nullable|string',
            'werkvorm' => 'nullable|in:individueel,groepje,synchroon,asynchroon',
            'materiaal_type' => 'nullable|in:fysiek,online,beide',
        ]);

        $lesvoorbereiding->update($validated);

        return redirect()->route('lesvoorbereidingen.index')
            ->with('success', 'Lesvoorbereiding is succesvol bijgewerkt.');
    }

    public function destroy(Lesvoorbereiding $lesvoorbereiding)
    {
        $lesvoorbereiding->delete();

        return redirect()->route('lesvoorbereidingen.index')
            ->with('success', 'Lesvoorbereiding is succesvol verwijderd.');
    }
}
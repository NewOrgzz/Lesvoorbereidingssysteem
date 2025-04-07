<?php

namespace App\Http\Controllers;

use App\Models\Lesversie;
use App\Models\Lesvoorbereiding;
use Illuminate\Http\Request;

class LesversiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lesversies = Lesversie::with('lesvoorbereiding')->get();
        return view('lesversies.index', compact('lesversies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lesvoorbereidingen = Lesvoorbereiding::all();
        return view('lesversies.create', compact('lesvoorbereidingen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lesvoorbereiding_id' => 'required|exists:lesvoorbereidingen,id',
            'versie' => 'required|string',
            'inleiding' => 'nullable|string',
            'kern' => 'nullable|string',
            'afsluiting' => 'nullable|string',
            'studentactiviteiten' => 'nullable|string',
            'docentactiviteiten' => 'nullable|string',
            'hulpmiddelen' => 'nullable|string',
            'opmerkingen' => 'nullable|string',
            'aandachtspunten' => 'nullable|string',
        ]);

        Lesversie::create($validated);

        return redirect()->route('lesversies.index')
            ->with('success', 'Lesversie is succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesversie $lesversie)
    {
        return view('lesversies.show', compact('lesversie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesversie $lesversie)
    {
        $lesvoorbereidingen = Lesvoorbereiding::all();
        return view('lesversies.edit', compact('lesversie', 'lesvoorbereidingen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesversie $lesversie)
    {
        $validated = $request->validate([
            'lesvoorbereiding_id' => 'required|exists:lesvoorbereidingen,id',
            'versie' => 'required|string',
            'inleiding' => 'nullable|string',
            'kern' => 'nullable|string',
            'afsluiting' => 'nullable|string',
            'studentactiviteiten' => 'nullable|string',
            'docentactiviteiten' => 'nullable|string',
            'hulpmiddelen' => 'nullable|string',
            'opmerkingen' => 'nullable|string',
            'aandachtspunten' => 'nullable|string',
        ]);

        $lesversie->update($validated);

        return redirect()->route('lesversies.index')
            ->with('success', 'Lesversie is succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesversie $lesversie)
    {
        $lesversie->delete();

        return redirect()->route('lesversies.index')
            ->with('success', 'Lesversie is succesvol verwijderd.');
    }
}

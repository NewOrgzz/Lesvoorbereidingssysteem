<?php

namespace App\Http\Controllers;

use App\Models\Vak;
use App\Models\Schooljaar;
use Illuminate\Http\Request;

class VakkenController extends Controller
{
    public function index()
    {
        $vakken = Vak::with(['schooljaar', 'lesvoorbereidingen'])->get();
        return view('vakken.index', compact('vakken'));
    }

    public function create()
    {
        $schooljaren = Schooljaar::all();
        return view('vakken.create', compact('schooljaren'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'schooljaar_id' => 'required|exists:schooljaren,id',
            'naam' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
        ]);

        Vak::create($validated);

        return redirect()->route('vakken.index')
            ->with('success', 'Vak is succesvol aangemaakt.');
    }

    public function show(Vak $vak)
    {
        return view('vakken.show', compact('vak'));
    }

    public function edit(Vak $vak)
    {
        $schooljaren = Schooljaar::all();
        return view('vakken.edit', compact('vak', 'schooljaren'));
    }

    public function update(Request $request, Vak $vak)
    {
        $validated = $request->validate([
            'schooljaar_id' => 'required|exists:schooljaren,id',
            'naam' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
        ]);

        $vak->update($validated);

        return redirect()->route('vakken.index')
            ->with('success', 'Vak is succesvol bijgewerkt.');
    }

    public function destroy(Vak $vak)
    {
        $vak->delete();

        return redirect()->route('vakken.index')
            ->with('success', 'Vak is succesvol verwijderd.');
    }
}
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Lesvoorbereiding Bewerken</h1>
        <div class="flex space-x-3">
            <a href="{{ route('lesvoorbereidingen.show', 1) }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                Bekijken
            </a>
            <a href="{{ route('lesvoorbereidingen.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Terug naar overzicht
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('lesvoorbereidingen.update', 1) }}" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Basis informatie -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Basis Informatie</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="vak_id" class="block text-sm font-medium text-gray-700 mb-2">Vak *</label>
                        <select id="vak_id" name="vak_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Selecteer een vak</option>
                            <option value="1" selected>Wiskunde - 4 HAVO</option>
                            <option value="2">Nederlands - 5 VWO</option>
                            <option value="3">Biologie - 3 HAVO</option>
                            <option value="4">Geschiedenis - 4 VWO</option>
                        </select>
                    </div>
                    <div>
                        <label for="titel" class="block text-sm font-medium text-gray-700 mb-2">Titel *</label>
                        <input type="text" id="titel" name="titel" required value="Kwadratische vergelijkingen" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="datum" class="block text-sm font-medium text-gray-700 mb-2">Datum *</label>
                        <input type="date" id="datum" name="datum" required value="2024-01-15" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="tijd" class="block text-sm font-medium text-gray-700 mb-2">Tijd</label>
                        <input type="time" id="tijd" name="tijd" value="13:30" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="lokaal" class="block text-sm font-medium text-gray-700 mb-2">Lokaal</label>
                        <input type="text" id="lokaal" name="lokaal" value="B12" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="groepssamenstelling" class="block text-sm font-medium text-gray-700 mb-2">Groepssamenstelling</label>
                        <input type="text" id="groepssamenstelling" name="groepssamenstelling" value="25 leerlingen" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <!-- Lesinhoud -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Lesinhoud</h2>
                <div class="space-y-6">
                    <div>
                        <label for="beginsituatie" class="block text-sm font-medium text-gray-700 mb-2">Beginsituatie</label>
                        <textarea id="beginsituatie" name="beginsituatie" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">De leerlingen hebben in de vorige les kennisgemaakt met kwadratische functies en kunnen eenvoudige kwadratische vergelijkingen oplossen door ontbinden in factoren. Ze zijn bekend met de grafische weergave van parabolen.</textarea>
                    </div>
                    <div>
                        <label for="leerdoelen" class="block text-sm font-medium text-gray-700 mb-2">Leerdoelen</label>
                        <textarea id="leerdoelen" name="leerdoelen" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">• Leerlingen kunnen kwadratische vergelijkingen oplossen met de abc-formule
• Leerlingen begrijpen wanneer de discriminant positief, nul of negatief is
• Leerlingen kunnen de oplossingen controleren door substitutie</textarea>
                    </div>
                    <div>
                        <label for="voorbereiding" class="block text-sm font-medium text-gray-700 mb-2">Voorbereiding</label>
                        <textarea id="voorbereiding" name="voorbereiding" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">De les begint met een korte herhaling van de vorige les. Daarna introduceer ik de abc-formule met een praktisch voorbeeld op het bord.

Vervolgens gaan de leerlingen in tweetallen oefenen met verschillende soorten kwadratische vergelijkingen. Ik loop rond om vragen te beantwoorden.

Aan het einde van de les bespreken we klassikaal de moeilijkste opgaven en geef ik huiswerk op.</textarea>
                    </div>
                </div>
            </div>

            <!-- Werkvorm en materiaal -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Werkvorm en Materiaal</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="werkvorm" class="block text-sm font-medium text-gray-700 mb-2">Werkvorm</label>
                        <select id="werkvorm" name="werkvorm" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Selecteer werkvorm</option>
                            <option value="individueel" selected>Individueel</option>
                            <option value="groepje">Groepje</option>
                            <option value="synchroon">Synchroon</option>
                            <option value="asynchroon">Asynchroon</option>
                        </select>
                    </div>
                    <div>
                        <label for="materiaal_type" class="block text-sm font-medium text-gray-700 mb-2">Materiaal Type</label>
                        <select id="materiaal_type" name="materiaal_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Selecteer materiaal type</option>
                            <option value="fysiek" selected>Fysiek</option>
                            <option value="online">Online</option>
                            <option value="beide">Beide</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Acties -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('lesvoorbereidingen.show', 1) }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Annuleren
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Wijzigingen Opslaan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 
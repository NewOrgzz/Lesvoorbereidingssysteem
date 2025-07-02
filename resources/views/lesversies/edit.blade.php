@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Lesversie Bewerken</h1>
        <a href="{{ route('lesversies.show', 1) }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Terug naar details
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('lesversies.update', 1) }}" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Basis informatie -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Lesversie Informatie</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="titel" class="block text-sm font-medium text-gray-700 mb-2">Titel *</label>
                        <input type="text" id="titel" name="titel" value="Introductie kwadratische vergelijkingen" required placeholder="Bijv. Introductie kwadratische vergelijkingen" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="lesvoorbereiding_id" class="block text-sm font-medium text-gray-700 mb-2">Gebaseerd op lesvoorbereiding *</label>
                        <select id="lesvoorbereiding_id" name="lesvoorbereiding_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Selecteer lesvoorbereiding</option>
                            <option value="1" selected>Introductie kwadratische vergelijkingen - Wiskunde 4 HAVO</option>
                            <option value="2">Literatuurgeschiedenis - Nederlands 5 VWO</option>
                            <option value="3">Fotosynthese - Biologie 3 HAVO</option>
                            <option value="4">Koude Oorlog - Geschiedenis 4 VWO</option>
                        </select>
                    </div>
                    <div>
                        <label for="versie_nummer" class="block text-sm font-medium text-gray-700 mb-2">Versienummer *</label>
                        <input type="text" id="versie_nummer" name="versie_nummer" value="v2.1" required placeholder="Bijv. v1.0, v2.1" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                        <select id="status" name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Selecteer status</option>
                            <option value="concept">Concept</option>
                            <option value="in_behandeling">In behandeling</option>
                            <option value="voltooid" selected>Voltooid</option>
                            <option value="gearchiveerd">Gearchiveerd</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Beschrijving -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Beschrijving</h2>
                <div>
                    <label for="beschrijving" class="block text-sm font-medium text-gray-700 mb-2">Beschrijving</label>
                    <textarea id="beschrijving" name="beschrijving" rows="4" placeholder="Beschrijf de wijzigingen en verbeteringen in deze versie..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Deze versie bevat verbeterde uitleg van kwadratische vergelijkingen met extra voorbeelden en praktische oefeningen. De theorie is aangepast op basis van feedback van leerlingen en collega's.</textarea>
                </div>
            </div>

            <!-- Wijzigingen -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Wijzigingen</h2>
                <div class="space-y-4">
                    <div>
                        <label for="wijzigingen" class="block text-sm font-medium text-gray-700 mb-2">Wijzigingen log</label>
                        <textarea id="wijzigingen" name="wijzigingen" rows="6" placeholder="Beschrijf gedetailleerd welke wijzigingen zijn aangebracht in deze versie..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">• Toegevoegd: Stap-voor-stap uitleg van het oplossen van kwadratische vergelijkingen met visuele voorbeelden
• Toegevoegd: 5 nieuwe praktische oefeningen met oplossingen voor zelfstandige verwerking
• Gecorrigeerd: Fout in voorbeeld 3 op pagina 2 (verkeerde berekening bij ontbinden in factoren)
• Verbeterd: Layout en formatting van de lesstof voor betere leesbaarheid</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="reden_wijziging" class="block text-sm font-medium text-gray-700 mb-2">Reden voor wijziging</label>
                            <select id="reden_wijziging" name="reden_wijziging" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Selecteer reden</option>
                                <option value="verbetering" selected>Verbetering</option>
                                <option value="correctie">Correctie</option>
                                <option value="uitbreiding">Uitbreiding</option>
                                <option value="aanpassing_niveau">Aanpassing niveau</option>
                                <option value="feedback_verwerking">Verwerking feedback</option>
                                <option value="andere">Andere</option>
                            </select>
                        </div>
                        <div>
                            <label for="prioriteit" class="block text-sm font-medium text-gray-700 mb-2">Prioriteit</label>
                            <select id="prioriteit" name="prioriteit" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="laag">Laag</option>
                                <option value="normaal" selected>Normaal</option>
                                <option value="hoog">Hoog</option>
                                <option value="kritiek">Kritiek</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instellingen -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Instellingen</h2>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="is_actief" name="is_actief" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_actief" class="ml-2 block text-sm text-gray-900">
                            Deze versie is actief
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="toon_in_overzicht" name="toon_in_overzicht" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="toon_in_overzicht" class="ml-2 block text-sm text-gray-900">
                            Toon in overzicht
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="automatisch_archiveren" name="automatisch_archiveren" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="automatisch_archiveren" class="ml-2 block text-sm text-gray-900">
                            Automatisch archiveren na nieuwe versie
                        </label>
                    </div>
                </div>
            </div>

            <!-- Gevorderde instellingen -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Gevorderde Instellingen</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="versie_type" class="block text-sm font-medium text-gray-700 mb-2">Versie type</label>
                        <select id="versie_type" name="versie_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="major">Major (grote wijzigingen)</option>
                            <option value="minor" selected>Minor (kleine wijzigingen)</option>
                            <option value="patch">Patch (bugfixes)</option>
                        </select>
                    </div>
                    <div>
                        <label for="compatibiliteit" class="block text-sm font-medium text-gray-700 mb-2">Compatibiliteit</label>
                        <select id="compatibiliteit" name="compatibiliteit" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="achterwaarts_compatibel" selected>Achterwaarts compatibel</option>
                            <option value="niet_compatibel">Niet compatibel</option>
                            <option value="voorwaarts_compatibel">Voorwaarts compatibel</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Acties -->
            <div class="flex justify-between items-center">
                <div class="flex space-x-4">
                    <button type="button" class="px-4 py-2 border border-red-300 text-red-700 rounded-md hover:bg-red-50">
                        Versie Archiveren
                    </button>
                    <button type="button" class="px-4 py-2 border border-red-300 text-red-700 rounded-md hover:bg-red-50">
                        Versie Verwijderen
                    </button>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('lesversies.show', 1) }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Annuleren
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Wijzigingen Opslaan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 
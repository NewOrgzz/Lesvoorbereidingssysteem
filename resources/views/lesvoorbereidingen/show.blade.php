@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Lesvoorbereiding Details</h1>
        <div class="flex space-x-3">
            <a href="{{ route('lesvoorbereidingen.edit', 1) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Bewerken
            </a>
            <a href="{{ route('lesvoorbereidingen.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Terug naar overzicht
            </a>
        </div>
    </div>

    <!-- Header informatie -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div class="flex items-start justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Kwadratische vergelijkingen</h2>
                <div class="flex items-center space-x-4 text-sm text-gray-600">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        Wiskunde - 4 HAVO
                    </span>
                    <span>Datum: 15 januari 2024</span>
                    <span>Tijd: 13:30 - 14:20</span>
                    <span>Lokaal: B12</span>
                </div>
            </div>
            <div class="text-right">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    Afgerond
                </span>
                <p class="text-sm text-gray-500 mt-1">Laatst bewerkt: 2 uur geleden</p>
            </div>
        </div>
    </div>

    <!-- Details grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Hoofdinformatie -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Beginsituatie -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Beginsituatie
                </h3>
                <p class="text-gray-700 leading-relaxed">
                    De leerlingen hebben in de vorige les kennisgemaakt met kwadratische functies en kunnen eenvoudige kwadratische vergelijkingen oplossen door ontbinden in factoren. Ze zijn bekend met de grafische weergave van parabolen.
                </p>
            </div>

            <!-- Leerdoelen -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Leerdoelen
                </h3>
                <ul class="space-y-2 text-gray-700">
                    <li class="flex items-start gap-2">
                        <span class="text-green-500 mt-1">•</span>
                        <span>Leerlingen kunnen kwadratische vergelijkingen oplossen met de abc-formule</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-green-500 mt-1">•</span>
                        <span>Leerlingen begrijpen wanneer de discriminant positief, nul of negatief is</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-green-500 mt-1">•</span>
                        <span>Leerlingen kunnen de oplossingen controleren door substitutie</span>
                    </li>
                </ul>
            </div>

            <!-- Voorbereiding -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Voorbereiding
                </h3>
                <div class="prose max-w-none text-gray-700">
                    <p class="mb-4">
                        De les begint met een korte herhaling van de vorige les. Daarna introduceer ik de abc-formule met een praktisch voorbeeld op het bord.
                    </p>
                    <p class="mb-4">
                        Vervolgens gaan de leerlingen in tweetallen oefenen met verschillende soorten kwadratische vergelijkingen. Ik loop rond om vragen te beantwoorden.
                    </p>
                    <p>
                        Aan het einde van de les bespreken we klassikaal de moeilijkste opgaven en geef ik huiswerk op.
                    </p>
                </div>
            </div>
        </div>

        <!-- Zijpaneel -->
        <div class="space-y-6">
            <!-- Werkvorm en materiaal -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Werkvorm & Materiaal</h3>
                <div class="space-y-4">
                    <div>
                        <span class="text-sm font-medium text-gray-500">Werkvorm</span>
                        <p class="text-gray-900">Individueel / Groepje</p>
                    </div>
                    <div>
                        <span class="text-sm font-medium text-gray-500">Materiaal Type</span>
                        <p class="text-gray-900">Fysiek</p>
                    </div>
                    <div>
                        <span class="text-sm font-medium text-gray-500">Groepssamenstelling</span>
                        <p class="text-gray-900">25 leerlingen</p>
                    </div>
                </div>
            </div>

            <!-- Versies -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Versies</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-sm">Versie 1.2</p>
                            <p class="text-xs text-gray-500">2 uur geleden</p>
                        </div>
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Huidig</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-sm">Versie 1.1</p>
                            <p class="text-xs text-gray-500">1 dag geleden</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="font-medium text-sm">Versie 1.0</p>
                            <p class="text-xs text-gray-500">3 dagen geleden</p>
                        </div>
                    </div>
                </div>
                <button class="w-full mt-4 px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 text-sm">
                    Nieuwe versie maken
                </button>
            </div>

            <!-- Acties -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Acties</h3>
                <div class="space-y-3">
                    <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm">
                        PDF Exporteren
                    </button>
                    <button class="w-full px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 text-sm">
                        Delen
                    </button>
                    <button class="w-full px-4 py-2 border border-red-300 rounded-md text-red-700 hover:bg-red-50 text-sm">
                        Verwijderen
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
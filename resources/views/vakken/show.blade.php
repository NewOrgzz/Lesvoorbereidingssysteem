@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Vak Details</h1>
        <div class="flex space-x-3">
            <a href="{{ route('vakken.edit', 1) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Bewerken
            </a>
            <a href="{{ route('vakken.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Terug naar overzicht
            </a>
        </div>
    </div>

    <!-- Vak header -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-16 w-16">
                <div class="h-16 w-16 rounded-full bg-blue-100 flex items-center justify-center">
                    <span class="text-blue-600 font-bold text-xl">W</span>
                </div>
            </div>
            <div class="ml-6">
                <h2 class="text-2xl font-bold text-gray-900">Wiskunde</h2>
                <p class="text-gray-600">Kwadratische vergelijkingen</p>
                <div class="flex items-center mt-2 space-x-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                        4 HAVO
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        Actief
                    </span>
                    <span class="text-sm text-gray-500">Schooljaar: 2023-2024</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Hoofdinhoud -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Beschrijving -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Beschrijving</h3>
                <p class="text-gray-700 leading-relaxed">
                    Dit vak behandelt de basis van kwadratische vergelijkingen voor 4 HAVO leerlingen. 
                    We focussen op het oplossen van kwadratische vergelijkingen, het tekenen van parabolen 
                    en het toepassen van deze kennis in praktische situaties.
                </p>
            </div>

            <!-- Lesvoorbereidingen -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold">Lesvoorbereidingen</h3>
                        <a href="{{ route('lesvoorbereidingen.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                            Nieuwe lesvoorbereiding
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titel</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">Introductie kwadratische vergelijkingen</div>
                                    <div class="text-sm text-gray-500">Les 1 - Theorie en voorbeelden</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Voltooid
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">15 sep 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900">Bekijken</a>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">Oplossen met ontbinden in factoren</div>
                                    <div class="text-sm text-gray-500">Les 2 - Praktische oefeningen</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        In behandeling
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">22 sep 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900">Bekijken</a>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">ABC-formule toepassen</div>
                                    <div class="text-sm text-gray-500">Les 3 - Gevorderde technieken</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Concept
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">29 sep 2023</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900">Bekijken</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Statistieken -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Statistieken</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Totaal lesvoorbereidingen</span>
                        <span class="font-semibold">6</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Voltooid</span>
                        <span class="font-semibold text-green-600">3</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">In behandeling</span>
                        <span class="font-semibold text-yellow-600">2</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Concept</span>
                        <span class="font-semibold text-gray-600">1</span>
                    </div>
                </div>
            </div>

            <!-- Snelle acties -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Snelle Acties</h3>
                <div class="space-y-3">
                    <a href="{{ route('lesvoorbereidingen.create') }}" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Nieuwe lesvoorbereiding
                    </a>
                    <a href="#" class="w-full bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Exporteer overzicht
                    </a>
                </div>
            </div>

            <!-- Informatie -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Informatie</h3>
                <div class="space-y-3">
                    <div>
                        <span class="text-sm text-gray-500">Aangemaakt op</span>
                        <p class="text-sm font-medium">1 september 2023</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Laatst bijgewerkt</span>
                        <p class="text-sm font-medium">2 dagen geleden</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Door</span>
                        <p class="text-sm font-medium">J. Jansen</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
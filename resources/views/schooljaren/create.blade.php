@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Nieuw Schooljaar</h1>
        <a href="{{ route('schooljaren.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Terug naar overzicht
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('schooljaren.store') }}" class="space-y-6">
            @csrf
            
            <!-- Basis informatie -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Schooljaar Informatie</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="naam" class="block text-sm font-medium text-gray-700 mb-2">Naam *</label>
                        <input type="text" id="naam" name="naam" required placeholder="Bijv. 2024-2025" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p class="text-sm text-gray-500 mt-1">Gebruik het formaat: YYYY-YYYY</p>
                    </div>
                    <div class="md:col-span-2">
                        <label for="beschrijving" class="block text-sm font-medium text-gray-700 mb-2">Beschrijving</label>
                        <textarea id="beschrijving" name="beschrijving" rows="3" placeholder="Optionele beschrijving van het schooljaar..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                </div>
            </div>

            <!-- Datums -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Periode</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="start_datum" class="block text-sm font-medium text-gray-700 mb-2">Startdatum *</label>
                        <input type="date" id="start_datum" name="start_datum" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p class="text-sm text-gray-500 mt-1">Meestal 1 september</p>
                    </div>
                    <div>
                        <label for="eind_datum" class="block text-sm font-medium text-gray-700 mb-2">Einddatum *</label>
                        <input type="date" id="eind_datum" name="eind_datum" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p class="text-sm text-gray-500 mt-1">Meestal 31 augustus</p>
                    </div>
                </div>
            </div>

            <!-- Instellingen -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Instellingen</h2>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="is_actief" name="is_actief" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_actief" class="ml-2 block text-sm text-gray-900">
                            Dit is het actieve schooljaar
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="auto_vakken" name="auto_vakken" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="auto_vakken" class="ml-2 block text-sm text-gray-900">
                            Automatisch vakken kopiëren van vorig schooljaar
                        </label>
                    </div>
                </div>
            </div>

            <!-- Acties -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('schooljaren.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Annuleren
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Schooljaar Aanmaken
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Nieuw Vak</h1>
        <a href="{{ route('vakken.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Terug naar overzicht
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('vakken.store') }}" class="space-y-6">
            @csrf
            
            <!-- Basis informatie -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Vak Informatie</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="naam" class="block text-sm font-medium text-gray-700 mb-2">Vaknaam *</label>
                        <input type="text" id="naam" name="naam" required placeholder="Bijv. Wiskunde" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="schooljaar_id" class="block text-sm font-medium text-gray-700 mb-2">Schooljaar *</label>
                        <select id="schooljaar_id" name="schooljaar_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Selecteer schooljaar</option>
                            <option value="1" selected>2023-2024</option>
                            <option value="2">2024-2025</option>
                            <option value="3">2022-2023</option>
                        </select>
                    </div>
                    <div>
                        <label for="niveau" class="block text-sm font-medium text-gray-700 mb-2">Niveau *</label>
                        <select id="niveau" name="niveau" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Selecteer niveau</option>
                            <option value="1 HAVO">1 HAVO</option>
                            <option value="2 HAVO">2 HAVO</option>
                            <option value="3 HAVO">3 HAVO</option>
                            <option value="4 HAVO">4 HAVO</option>
                            <option value="5 HAVO">5 HAVO</option>
                            <option value="1 VWO">1 VWO</option>
                            <option value="2 VWO">2 VWO</option>
                            <option value="3 VWO">3 VWO</option>
                            <option value="4 VWO">4 VWO</option>
                            <option value="5 VWO">5 VWO</option>
                            <option value="6 VWO">6 VWO</option>
                        </select>
                    </div>
                    <div>
                        <label for="kleur" class="block text-sm font-medium text-gray-700 mb-2">Kleur</label>
                        <select id="kleur" name="kleur" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="blue">Blauw</option>
                            <option value="green">Groen</option>
                            <option value="purple">Paars</option>
                            <option value="orange">Oranje</option>
                            <option value="red">Rood</option>
                            <option value="yellow">Geel</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Beschrijving -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Beschrijving</h2>
                <div>
                    <label for="beschrijving" class="block text-sm font-medium text-gray-700 mb-2">Beschrijving</label>
                    <textarea id="beschrijving" name="beschrijving" rows="4" placeholder="Beschrijf het vak, de inhoud en eventuele bijzonderheden..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
            </div>

            <!-- Instellingen -->
            <div class="border-b border-gray-200 pb-6">
                <h2 class="text-lg font-semibold mb-4">Instellingen</h2>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="is_actief" name="is_actief" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_actief" class="ml-2 block text-sm text-gray-900">
                            Dit vak is actief
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="toon_in_dashboard" name="toon_in_dashboard" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="toon_in_dashboard" class="ml-2 block text-sm text-gray-900">
                            Toon in dashboard
                        </label>
                    </div>
                </div>
            </div>

            <!-- Acties -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('vakken.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Annuleren
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Vak Aanmaken
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <!-- Nieuwe lichte header -->
    <div class="flex items-center justify-between mb-8 bg-white rounded-lg shadow-sm px-6 py-4 border border-gray-100">
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center justify-center w-10 h-10 bg-blue-100 text-blue-600 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 001 1h3m10-5v4a1 1 0 01-1 1h-3m-4 0h4" />
                </svg>
            </span>
            <div>
                <h1 class="text-2xl font-bold leading-tight">Dashboard</h1>
                <span class="text-gray-500 text-sm">Overzicht &amp; snelle acties</span>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <span class="inline-flex items-center px-3 py-1 bg-red-100 text-red-600 text-xs rounded-full">2 nieuwe notificaties</span>
            <div class="flex items-center gap-2">
                <span class="font-semibold">Jan Docent</span>
                <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-700 rounded-full font-bold">JD</span>
            </div>
        </div>
    </div>
    <!-- Einde nieuwe header -->

    <div class="mb-8">
        <div class="bg-white rounded-lg shadow p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-lg font-semibold mb-1">Welkom terug, Jan!</h2>
                <p class="text-gray-600">Je hebt {{ $totaalLesvoorbereidingen }} lesvoorbereidingen voor deze week en 2 nieuwe notificaties.</p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <div class="bg-blue-100 text-blue-600 rounded-full p-3 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            </div>
            <div class="font-semibold mb-1">Nieuwe Lesvoorbereiding</div>
            <div class="text-gray-500 text-sm mb-2">Maak een nieuwe lesvoorbereiding aan</div>
            <a href="{{ route('lesvoorbereidingen.create') }}" class="text-blue-600 font-semibold hover:underline">Start</a>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <div class="bg-green-100 text-green-600 rounded-full p-3 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 001 1h3m10-5v4a1 1 0 01-1 1h-3m-4 0h4" /></svg>
            </div>
            <div class="font-semibold mb-1">Mijn Lesvoorbereidingen</div>
            <div class="text-gray-500 text-sm mb-2">Bekijk al je lesvoorbereidingen</div>
            <a href="{{ route('lesvoorbereidingen.index') }}" class="text-blue-600 font-semibold hover:underline">Openen</a>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <div class="bg-orange-100 text-orange-600 rounded-full p-3 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 018 0v2m-4-4a4 4 0 00-4-4V7a4 4 0 018 0v2a4 4 0 00-4 4z" /></svg>
            </div>
            <div class="font-semibold mb-1">Vakken</div>
            <div class="text-gray-500 text-sm mb-2">Beheer je vakken</div>
            <a href="{{ route('vakken.index') }}" class="text-blue-600 font-semibold hover:underline">Openen</a>
        </div>
        <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
            <div class="bg-purple-100 text-purple-600 rounded-full p-3 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            </div>
            <div class="font-semibold mb-1">Instellingen</div>
            <div class="text-gray-500 text-sm mb-2">Beheer je account</div>
            <a href="{{ route('instellingen') }}" class="text-blue-600 font-semibold hover:underline">Openen</a>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Recente Activiteiten</h2>
                <a href="#" class="text-blue-600 text-sm font-semibold hover:underline">Alles bekijken</a>
            </div>
            <ul class="divide-y">
                @foreach($activiteiten as $activiteit)
                    <li class="py-3 flex items-center gap-3">
                        @if($activiteit['type'] === 'aangemaakt')
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-green-100 text-green-600 rounded-full"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'/></svg></span>
                        @elseif($activiteit['type'] === 'bewerkt')
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-600 rounded-full"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5h2m-1 0v14m-7-7h14'/></svg></span>
                        @elseif($activiteit['type'] === 'versie')
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-purple-100 text-purple-600 rounded-full"><svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'/></svg></span>
                        @endif
                        <div>
                            <div class="font-medium">{{ $activiteit['beschrijving'] }}</div>
                            <div class="text-gray-500 text-xs">{{ $activiteit['vak'] }} &middot; {{ $activiteit['tijd'] }}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Aankomende Lessen</h2>
                <a href="#" class="text-blue-600 text-sm font-semibold hover:underline">Alles bekijken</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-500">
                            <th class="py-2 px-4">Vak</th>
                            <th class="py-2 px-4">Onderwerp</th>
                            <th class="py-2 px-4">Datum</th>
                            <th class="py-2 px-4">Tijd</th>
                            <th class="py-2 px-4">Lokaal</th>
                            <th class="py-2 px-4">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($komendeLessen as $les)
                            <tr class="border-t">
                                <td class="py-2 px-4">{{ $les['vak'] }}</td>
                                <td class="py-2 px-4">{{ $les['onderwerp'] }}</td>
                                <td class="py-2 px-4">{{ $les['datum'] }}</td>
                                <td class="py-2 px-4">{{ $les['tijd'] }}</td>
                                <td class="py-2 px-4">{{ $les['lokaal'] }}</td>
                                <td class="py-2 px-4">
                                    <a href="#" class="text-blue-600 hover:underline mr-2">Bekijken</a>
                                    <a href="#" class="text-gray-600 hover:underline">Bewerken</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

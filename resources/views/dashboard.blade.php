<x-app-layout>
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <aside class="w-64 hidden md:block">
            @include('partials.sidebar')
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-10">
            <!-- Header -->
            <div class="flex items-center justify-between mb-10">
                <div class="flex-1 flex justify-center">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
                </div>
                <div class="flex items-center gap-4">
                    <button class="relative">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1">2</span>
                    </button>
                    <div class="flex items-center gap-2">
                        <div class="w-9 h-9 rounded-full bg-blue-500 flex items-center justify-center font-bold text-white">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                        <span class="font-medium">{{ $user->name }}</span>
                    </div>
                </div>
            </div>

            <!-- Welkom en snelkoppelingen -->
            <div class="mb-10">
                <div class="bg-white rounded-xl p-6 border border-gray-100 mb-6">
                    <h2 class="text-lg font-semibold mb-1">Welkom terug, {{ strtok($user->name, ' ') }}!</h2>
                    <p class="text-gray-600">Je hebt <span class="font-bold">{{ $totaalLesvoorbereidingen }}</span> lesvoorbereidingen voor deze week en <span class="font-bold">2</span> nieuwe notificaties.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <a href="{{ route('lesvoorbereidingen.create') }}" class="bg-white rounded-xl p-6 border border-gray-200 flex flex-col items-center hover:bg-gray-50 transition">
                        <span class="text-3xl mb-2 text-blue-500 bg-blue-100 rounded-full p-3"><i class="fas fa-plus"></i></span>
                        <span class="font-semibold">Nieuwe Lesvoorbereiding</span>
                        <span class="text-gray-500 text-sm">Maak een nieuwe lesvoorbereiding aan</span>
                    </a>
                    <a href="{{ route('lesvoorbereidingen.index') }}" class="bg-white rounded-xl p-6 border border-gray-200 flex flex-col items-center hover:bg-gray-50 transition">
                        <span class="text-3xl mb-2 text-green-600 bg-green-100 rounded-full p-3"><i class="fas fa-book"></i></span>
                        <span class="font-semibold">Mijn Lesvoorbereidingen</span>
                        <span class="text-gray-500 text-sm">Bekijk al je lesvoorbereidingen</span>
                    </a>
                    <a href="{{ route('vakken.index') }}" class="bg-white rounded-xl p-6 border border-gray-200 flex flex-col items-center hover:bg-gray-50 transition">
                        <span class="text-3xl mb-2 text-orange-500 bg-orange-100 rounded-full p-3"><i class="fas fa-layer-group"></i></span>
                        <span class="font-semibold">Vakken</span>
                        <span class="text-gray-500 text-sm">Beheer je vakken</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="bg-white rounded-xl p-6 border border-gray-200 flex flex-col items-center hover:bg-gray-50 transition">
                        <span class="text-3xl mb-2 text-purple-500 bg-purple-100 rounded-full p-3"><i class="fas fa-cog"></i></span>
                        <span class="font-semibold">Instellingen</span>
                        <span class="text-gray-500 text-sm">Beheer je account</span>
                    </a>
                </div>
            </div>

            <!-- Recente Activiteiten -->
            <div class="bg-white rounded-xl p-6 border border-gray-100 mb-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-lg">Recente Activiteiten</h3>
                    <a href="#" class="text-blue-600 text-sm">Alles bekijken</a>
                </div>
                <ul class="space-y-3">
                    @foreach($activiteiten as $activiteit)
                        <li class="flex items-start gap-3">
                            @if($activiteit['type'] === 'aangemaakt')
                                <span class="bg-blue-100 text-blue-500 rounded-full p-2 mt-1"><i class="fas fa-plus"></i></span>
                            @elseif($activiteit['type'] === 'bewerkt')
                                <span class="bg-green-100 text-green-600 rounded-full p-2 mt-1"><i class="fas fa-edit"></i></span>
                            @elseif($activiteit['type'] === 'versie')
                                <span class="bg-orange-100 text-orange-500 rounded-full p-2 mt-1"><i class="fas fa-copy"></i></span>
                            @elseif($activiteit['type'] === 'verwijderd')
                                <span class="bg-red-100 text-red-500 rounded-full p-2 mt-1"><i class="fas fa-trash"></i></span>
                            @endif
                            <div class="flex flex-col">
                                <span class="text-sm">Je hebt {{ $activiteit['beschrijving'] }}: <span class="font-medium">"{{ $activiteit['vak'] }}"</span></span>
                                <span class="text-xs text-gray-400 mt-1">{{ $activiteit['tijd'] }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Aankomende Lessen -->
            <div class="bg-white rounded-xl p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-lg">Aankomende Lessen</h3>
                    <a href="#" class="text-blue-600 text-sm">Alles bekijken</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b">
                                <th class="py-2 px-4">VAK</th>
                                <th class="py-2 px-4">ONDERWERP</th>
                                <th class="py-2 px-4">DATUM</th>
                                <th class="py-2 px-4">TIJD</th>
                                <th class="py-2 px-4">LOKAAL</th>
                                <th class="py-2 px-4">ACTIES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($komendeLessen as $les)
                                <tr class="border-b last:border-0">
                                    <td class="py-2 px-4 font-semibold text-gray-800">{{ $les['vak'] }}</td>
                                    <td class="py-2 px-4">{{ $les['onderwerp'] }}</td>
                                    <td class="py-2 px-4">{{ $les['datum'] }}</td>
                                    <td class="py-2 px-4">{{ $les['tijd'] }}</td>
                                    <td class="py-2 px-4">{{ $les['lokaal'] }}</td>
                                    <td class="py-2 px-4">
                                        <a href="#" class="text-blue-600 hover:underline">Bekijken</a>
                                        <span class="mx-1">|</span>
                                        <a href="#" class="text-gray-600 hover:underline">Bewerken</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>

@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-6">Instellingen</h1>
    <div x-data="{ tab: 'profiel' }">
        <div class="flex border-b mb-6">
            <button @click="tab = 'profiel'" :class="tab === 'profiel' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-blue-600'" class="px-4 py-2 border-b-2 font-semibold focus:outline-none">Profiel</button>
            <button @click="tab = 'wachtwoord'" :class="tab === 'wachtwoord' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-blue-600'" class="px-4 py-2 border-b-2 font-semibold focus:outline-none">Wachtwoord</button>
            <button @click="tab = 'notificaties'" :class="tab === 'notificaties' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-blue-600'" class="px-4 py-2 border-b-2 font-semibold focus:outline-none">Notificaties</button>
            <button @click="tab = 'thema'" :class="tab === 'thema' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-blue-600'" class="px-4 py-2 border-b-2 font-semibold focus:outline-none">Thema</button>
            <button @click="tab = 'taal'" :class="tab === 'taal' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-blue-600'" class="px-4 py-2 border-b-2 font-semibold focus:outline-none">Taal</button>
            <button @click="tab = 'account'" :class="tab === 'account' ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-blue-600'" class="px-4 py-2 border-b-2 font-semibold focus:outline-none">Account</button>
        </div>

        <!-- Profiel -->
        <div x-show="tab === 'profiel'">
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Naam</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="Jan Docent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md" value="jan.docent@email.nl">
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Opslaan</button>
            </form>
        </div>

        <!-- Wachtwoord -->
        <div x-show="tab === 'wachtwoord'">
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Huidig wachtwoord</label>
                    <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nieuw wachtwoord</label>
                    <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bevestig nieuw wachtwoord</label>
                    <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Wachtwoord wijzigen</button>
            </form>
        </div>

        <!-- Notificaties -->
        <div x-show="tab === 'notificaties'">
            <form class="space-y-4" method="POST" action="{{ route('profile.settings') }}">
                @csrf
                @method('PATCH')
                <div class="flex items-center justify-between">
                    <span class="text-gray-700">E-mail notificaties</span>
                    <input type="checkbox" name="email_notifications" value="1" class="h-5 w-5 text-blue-600 border-gray-300 rounded" {{ auth()->user()->email_notifications ? 'checked' : '' }}>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-700">Push notificaties</span>
                    <input type="checkbox" name="push_notifications" value="1" class="h-5 w-5 text-blue-600 border-gray-300 rounded" {{ auth()->user()->push_notifications ? 'checked' : '' }}>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-700">Nieuws & updates</span>
                    <input type="checkbox" name="news_notifications" value="1" class="h-5 w-5 text-blue-600 border-gray-300 rounded" {{ auth()->user()->news_notifications ? 'checked' : '' }}>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Voorkeuren opslaan</button>
                @if(session('status') === 'settings-updated')
                    <p class="text-green-600 text-sm mt-2">Voorkeuren opgeslagen.</p>
                @endif
            </form>
        </div>

        <!-- Thema -->
        <div x-show="tab === 'thema'">
            <form class="space-y-4" method="POST" action="{{ route('profile.settings') }}">
                @csrf
                @method('PATCH')
                <div class="flex items-center gap-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="theme" value="light" class="text-blue-600" {{ auth()->user()->theme === 'light' ? 'checked' : '' }}>
                        Licht
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="theme" value="dark" class="text-blue-600" {{ auth()->user()->theme === 'dark' ? 'checked' : '' }}>
                        Donker
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="theme" value="system" class="text-blue-600" {{ auth()->user()->theme === 'system' ? 'checked' : '' }}>
                        Systeem
                    </label>
                </div>
                <input type="hidden" name="email_notifications" value="{{ auth()->user()->email_notifications ? 1 : 0 }}">
                <input type="hidden" name="push_notifications" value="{{ auth()->user()->push_notifications ? 1 : 0 }}">
                <input type="hidden" name="news_notifications" value="{{ auth()->user()->news_notifications ? 1 : 0 }}">
                <input type="hidden" name="language" value="{{ auth()->user()->language }}">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Thema opslaan</button>
                @if(session('status') === 'settings-updated')
                    <p class="text-green-600 text-sm mt-2">Thema opgeslagen.</p>
                @endif
            </form>
        </div>

        <!-- Taal -->
        <div x-show="tab === 'taal'">
            <form class="space-y-4" method="POST" action="{{ route('profile.settings') }}">
                @csrf
                @method('PATCH')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Taal</label>
                    <select name="language" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        <option value="nl" {{ auth()->user()->language === 'nl' ? 'selected' : '' }}>Nederlands</option>
                        <option value="en" {{ auth()->user()->language === 'en' ? 'selected' : '' }}>Engels</option>
                        <option value="de" {{ auth()->user()->language === 'de' ? 'selected' : '' }}>Duits</option>
                        <option value="fr" {{ auth()->user()->language === 'fr' ? 'selected' : '' }}>Frans</option>
                    </select>
                </div>
                <input type="hidden" name="email_notifications" value="{{ auth()->user()->email_notifications ? 1 : 0 }}">
                <input type="hidden" name="push_notifications" value="{{ auth()->user()->push_notifications ? 1 : 0 }}">
                <input type="hidden" name="news_notifications" value="{{ auth()->user()->news_notifications ? 1 : 0 }}">
                <input type="hidden" name="theme" value="{{ auth()->user()->theme }}">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Taal opslaan</button>
                @if(session('status') === 'settings-updated')
                    <p class="text-green-600 text-sm mt-2">Taal opgeslagen.</p>
                @endif
            </form>
        </div>

        <!-- Account verwijderen -->
        <div x-show="tab === 'account'">
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                <h2 class="text-lg font-semibold text-red-700 mb-2">Account verwijderen</h2>
                <p class="text-red-700 mb-4">Let op: Dit kan niet ongedaan worden gemaakt. Al je gegevens worden permanent verwijderd.</p>
                <form method="POST" action="#">
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Verwijder mijn account</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

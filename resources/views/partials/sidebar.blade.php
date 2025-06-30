<div class="h-full flex flex-col bg-white min-h-screen">
    <!-- Logo -->
    <div class="flex items-center h-16 px-6">
        <span class="text-2xl font-bold text-purple-700">Les<span class="text-blue-600">Prep</span></span>
    </div>
    <nav class="flex-1 flex flex-col justify-between px-2 py-6">
        <div>
            <div class="text-xs text-gray-400 font-semibold px-4 mb-2 mt-2">HOOFDMENU</div>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('lesvoorbereidingen.index') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg {{ request()->routeIs('lesvoorbereidingen.*') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                        <i class="fas fa-book"></i> Lesvoorbereidingen
                    </a>
                </li>
                <li>
                    <a href="{{ route('schooljaren.index') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg {{ request()->routeIs('schooljaren.*') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                        <i class="fas fa-calendar-alt"></i> Schooljaren
                    </a>
                </li>
                <li>
                    <a href="{{ route('vakken.index') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg {{ request()->routeIs('vakken.*') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                        <i class="fas fa-layer-group"></i> Vakken
                    </a>
                </li>
            </ul>
            <div class="text-xs text-gray-400 font-semibold px-4 mb-2 mt-6">ACCOUNT</div>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg {{ request()->routeIs('profile.edit') ? 'bg-blue-100 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                        <i class="fas fa-cog"></i> Instellingen
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 py-2 px-4 rounded-lg text-red-600 hover:bg-red-50 w-full text-left font-semibold">
                            <i class="fas fa-sign-out-alt"></i> Uitloggen
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>

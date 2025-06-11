<x-guest-layout>
    <div class="min-h-screen bg-[#f5f5f5] py-12">
        <div class="flex justify-center items-center">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden w-full max-w-[1000px] mx-4 flex login-card">
                <!-- Left side - Image -->
                <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('/images/login-bg.jpg');"></div>

                <!-- Right side - Form -->
                <div class="w-full md:w-1/2 p-8 md:p-12">
                    <div class="mb-8">
                        <h1 class="text-4xl font-bold mb-2">Hallo,</h1>
                        <h2 class="text-4xl font-bold mb-4">Welkom Terug</h2>
                        <p class="text-gray-600">Log in</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                            <x-text-input 
                                id="email" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 form-input" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autofocus 
                                autocomplete="username" 
                                placeholder="abc123@gmail.com"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Wachtwoord')" class="text-gray-700" />
                            <div x-data="{}" x-cloak>
                                <x-text-input 
                                    id="password" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 form-input"
                                    type="password"
                                    name="password"
                                    required 
                                    autocomplete="current-password"
                                />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end">
                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Wachtwoord vergeten?') }}
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors login-button">
                            Inloggen
                        </button>

                        <div class="text-center mt-6">
                            <span class="text-gray-600">Nog geen account?</span>
                            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-semibold ml-1">Registreer</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

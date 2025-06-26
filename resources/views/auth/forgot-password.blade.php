<x-guest-layout>
    <div class="min-h-screen bg-[#f5f5f5] py-12">
        <div class="flex justify-center items-center">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden w-full max-w-[1000px] mx-4 flex login-card">
                <!-- Left side - Image -->
                <div class="hidden md:block w-1/2 bg-cover bg-center" style="background-image: url('/images/login-bg.jpg');"></div>

                <!-- Right side - Form -->
                <div class="w-full md:w-1/2 p-8 md:p-12">
                    <div class="mb-8">
                        <h1 class="text-4xl font-bold mb-2">Wachtwoord Vergeten?</h1>
                        <h2 class="text-4xl font-bold mb-4">Geen Zorgen</h2>
                        <p class="text-gray-600">Vul je email in en we sturen je een link om je wachtwoord te herstellen.</p>
                    </div>

                    <!-- Session Status -->
                    <div class="mb-4 text-sm text-gray-600">
                        {{ session('status') }}
                    </div>

                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors login-button">
                            Stuur Herstel Link
                        </button>

                        <div class="text-center mt-6">
                            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold">
                                Terug naar Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

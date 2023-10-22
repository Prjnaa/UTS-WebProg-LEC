<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" autocomplete="on">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full h-8" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full h-8" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full h-8" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full h-8"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full h-8"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4 flex justify-between">
            @vite('resources/css/radio.css')
            <x-input-label :value="__('Gender')" class="flex items-center"/>
            <div class="flex gap-10">
                <label class="radio-card">
                    <input type="radio" name="gender" id="gender-male" value="M" class="hidden">
                    <div class="card text-center rounded-md border-gray-300">
                        <span class="font-medium text-lg text-gray-700">Male</span>
                    </div>
                </label>
                <label class="radio-card">
                    <input type="radio" name="gender" id="gender-female" value="F" class="hidden">
                    <div class="card text-center rounded-md border-gray-300">
                        <span class="font-medium text-lg text-gray-700">Female</span>
                    </div>
                </label>
            </div>
        </div>


        <!-- Birth Date -->
        <div class=" mt-4">
            <x-input-label for="birth_date" :value="__('Birth Date')"/>
            <x-text-input id="birth_date" class="block mt-1 w-full h-8" type="date" name="birth_date" :value="old('birth_date')" required/>
        </div>

        <div class="flex items-center justify-end mt-10">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Sign Up') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

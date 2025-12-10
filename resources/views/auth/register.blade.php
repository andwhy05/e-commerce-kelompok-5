<x-guest-layout>
    <div class="shadow-2xl rounded-3xl p-8 sm:p-10 w-full max-w-md
                bg-white/90 backdrop-blur-sm border-2 border-pink-100/70">

        <!-- Logo / Judul -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-extrabold text-pink-700 drop-shadow-sm ">
                <span class="text-4xl align-middle"></span> Daftar Akun
            </h1>
            <p class="text-pink-500 mt-2 text-md font-medium ">
                Ayo bergabung dan nikmati kelezatan kue kami!
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" class="text-pink-600 font-semibold" :value="__('Name')" />
                <x-text-input id="name" 
                    class="block mt-1 w-full rounded-xl border-pink-300 focus:border-pink-500 focus:ring-pink-500 " type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" class="text-pink-600 font-semibold" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full rounded-xl border-pink-300 focus:border-pink-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" class="text-pink-600 font-semibold" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full rounded-xl border-pink-300 focus:border-pink-500"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" class="text-pink-600 font-semibold" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-xl border-pink-300 focus:border-pink-500"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-pink-600 hover:text-pink-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4 bg-pink-500 text-white px-5 py-2  font-semibold ">
                    {{ __('Register') }}
                </x-primary-button>
            </div>

            
        </form>
    </div>
</x-guest-layout>
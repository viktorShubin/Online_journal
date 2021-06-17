<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div>
                <x-label for="f_name" :value="__('f_name')" />

                <x-input id="f_name" class="block mt-1 w-full" type="text" name="f_name" :value="old('f_name')" required autofocus />
            </div>
            <div>
                <x-label for="s_name" :value="__('s_name')" />

                <x-input id="s_name" class="block mt-1 w-full" type="text" name="s_name" :value="old('s_name')" required autofocus />
            </div>
            <div>
                <x-label for="t_name" :value="__('t_name')" />

                <x-input id="t_name" class="block mt-1 w-full" type="text" name="t_name" :value="old('t_name')" required autofocus />
            </div>
            <div>
                <x-label for="phone_num" :value="__('phone_num')" />

                <x-input id="phone_num" class="block mt-1 w-full" type="text" name="phone_num" :value="old('phone_num')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

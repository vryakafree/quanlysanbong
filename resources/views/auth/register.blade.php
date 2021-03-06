<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                         autofocus placeholder="Enter your name"/>
            </div>

            <!-- Username -->
            <div class="mt-4">
                <x-label for="username" :value="__('Username')"/>

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                         required placeholder="Enter username"/>
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')"/>

                <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required
                         placeholder="Input your number"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         placeholder="Input your email"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"/>

                <x-input id="password" class="form-control"
                         type="password"
                         name="password"
                         required autocomplete="new-password"
                         placeholder="Enter the password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-input id="password_confirmation" class="form-control"
                         type="password"
                         name="password_confirmation" required
                         placeholder="Confirm the password"/>
            </div>

            <!-- Google reCaptcha -->
            <div class="mt-4 g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
            <!-- End Google reCaptcha -->

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

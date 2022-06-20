<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Đổi mật khẩu:
        </h2>
    </x-slot>

    <x-book>
        <form method="POST" action="{{ route('change.info') }}">
            @csrf

            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="new_name" :value="old('name')" required
                         autofocus value="{{ Auth::user()->name }}"/>
            </div>

            <!-- Username -->
            <div class="mt-4">
                <x-label for="username" :value="__('Username')"/>

                <x-input id="username" class="block mt-1 w-full" type="text" name="new_username" :value="old('username')"
                         required value="{{ Auth::user()->username }}"/>
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')"/>

                <x-input id="phone" class="block mt-1 w-full" type="tel" name="new_phone" :value="old('phone')" required
                         value="{{ Auth::user()->phone }}"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="new_email" :value="old('email')" required
                         value="{{ Auth::user()->email }}"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <div class="col-md-8 offset-md-4">
                    <x-button type="submit" class="btn btn-primary">
                        {{ __('Cập nhật thông tin') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-book>


</x-app-layout>

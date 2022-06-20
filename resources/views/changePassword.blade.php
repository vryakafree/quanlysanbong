<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Đổi mật khẩu:
        </h2>
    </x-slot>

    <x-book>
                            <form method="POST" action="{{ route('change.password') }}">
                                @csrf

                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-label for="password" :value="__('Current Password')"/>

                                    <x-input id="password" class="form-control"
                                             type="password"
                                             name="current_password"
                                             required autocomplete="current_password"
                                             placeholder="Nhập mật khẩu hiện tại"/>
                                </div>

                                <!-- New Password -->
                                <div class="mt-4">
                                    <x-label for="password" :value="__('New Password')"/>

                                    <x-input id="password" class="form-control"
                                             type="password"
                                             name="new_password"
                                             required autocomplete="new-password"
                                             placeholder="Nhập mật khẩu mới"/>
                                </div>

                                <!-- Confirm New Password -->
                                <div class="mt-4">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                                    <x-input id="password_confirmation" class="form-control"
                                             type="password"
                                             name="new_password_confirmation" required
                                             placeholder="Xác nhận mật khẩu mới"/>
                                </div>

                                <!-- Google reCaptcha -->
                                <div class="mt-4 g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
                                <!-- End Google reCaptcha -->

                                <div class="flex items-center justify-end mt-4">
                                    <div class="col-md-8 offset-md-4">
                                        <x-button type="submit" class="btn btn-primary">
                                            {{ __('Update Password') }}
                                        </x-button>
                                    </div>
                                </div>
                            </form>
    </x-book>


</x-app-layout>


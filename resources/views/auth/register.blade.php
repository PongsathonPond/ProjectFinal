<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="title_Name" value="{{ __('คำนำหน้า') }}" />
                <x-jet-input id="title_Name" class="block mt-1 w-full" type="text" name="title_Name"
                    :value="old('title_Name')" required autofocus autocomplete="title_Name" />
            </div>


            <div>
                <x-jet-label for="first_Name" value="{{ __('ชื่อ') }}" />
                <x-jet-input id="first_Name" class="block mt-1 w-full" type="text" name="first_Name"
                    :value="old('first_Name')" required autofocus autocomplete="first_Name" />
            </div>



            <div>
                <x-jet-label for="last_Name" value="{{ __('นามสกุล') }}" />
                <x-jet-input id="last_Name" class="block mt-1 w-full" type="text" name="last_Name"
                    :value="old('last_Name')" required autofocus autocomplete="last_Name" />
            </div>

            <div>
                <x-jet-label for="phone_Number" value="{{ __('เบอร์โทร') }}" />
                <x-jet-input id="phone_Number" class="block mt-1 w-full" type="text" name="phone_Number"
                    :value="old('phone_Number')" required autofocus autocomplete="phone_Number" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

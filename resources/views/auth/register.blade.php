<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4 space-x-4">

            <label>
                Customer
                <input type="radio" name="userrole" value="customer">

            </label>
            <label>
                Seller
                <input type="radio" name="userrole" value="seller">
            </label>

        </div>
        <x-input-error :messages="$errors->get('userrole')" class="mt-2" />


        {{-- Contact number --}}
        <div class="mt-4">
            <x-input-label for="contactnumber" :value="__('Contact Number')" />
            <x-text-input id="contactnumber" class="block mt-1 w-full" type="text" name="contactnumber"
                :value="old('contactnumber')" required autofocus autocomplete="contactnumber" />
            <x-input-error :messages="$errors->get('contactnumber')" class="mt-2" />
        </div>


        {{-- Profile Image --}}
        <input type="file" name="profile" class="file-input file-input-ghost mt-4  bg-white w-full max-w-xs" />
        <x-input-error :messages="$errors->get('profile')" class="mt-2" />

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

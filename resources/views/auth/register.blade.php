<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="w-full">
        @csrf

        <!-- Name -->
        <div>
          
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">


            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Enter your password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
          

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" 
                            placeholder="confirm your password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 " />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class=" text-sm text-gray-900 hover:text-gray-900 rounded-md font-bold" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-secoundary-button class="ms-4">
                {{ __('Register') }}
            </x-secoundary-button>
        
        </div>
    </form>
</x-guest-layout>

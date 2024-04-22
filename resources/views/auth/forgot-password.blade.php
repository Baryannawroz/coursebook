<x-guest-layout>
  

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"  />
    <div>

      <div class="mb-4 text-sm text-black font-bold">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
      </div>
      <form method="POST" action="{{ route('password.email') }}" >
        @csrf
        
        <!-- Email Address -->
        <div>
          
          <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="enter your email"/>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <div class="flex items-center justify-end mt-4">
          <x-secoundary-button>
            {{ __('Email Password Reset Link') }}
          </x-secoundary-button>
        </div>
      </form>
    </div>
</x-guest-layout>

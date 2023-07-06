<x-guest-layout>
    <div id="project" class="project">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                  <div class="loginBox"><h2>Register for Nuper</h2></div>
                  </div>
               </div>
            </div>
         </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="loginBox">
            <x-text-input id="name" class="loginBox" placeholder="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="loginBox">
            <x-text-input id="email" placeholder="e-mail" class="loginBox" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="loginBox">
            <x-text-input id="password" class="loginBox" placeholder="password"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="loginBox">
            <x-text-input id="password_confirmation" class="loginBox" placeholder="confirm password"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="loginBox">
            <a class="loginBox" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="read_more">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-guest-layout>

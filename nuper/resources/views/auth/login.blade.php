<x-guest-layout>
    <div id="project" class="project">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                  <div class="loginBox"><h2>Login to Nuper</h2></div>
                  </div>
               </div>
            </div>
         </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="loginBox">

            <x-text-input id="email" placeholder="e-mail" class="loginBox" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="loginBox">
            <x-text-input id="password" placeholder="password" class="loginBox"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="loginBox">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="loginBox">
            @if (Route::has('password.request'))
                <a class="loginBox">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="read_more">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <head>
    <title>Connexion au compte</title>
    <link rel="icon" href="{{ asset('css/img/LogoLPMini.webp') }}" type="image/png">
    </head>
    <link rel="stylesheet" href="{{ asset ('css/login.css')}}">

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <a href="{{ url('accueil') }}">
        <img src="{{ asset('css/logo.png')}}" alt="Logo">
        </a>

        <!-- Email Address -->
        <div class="mt-4">
            <p class="lbl">Email :</p>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Entrez votre Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <p class="lbl">Mot de passe :</p>
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Entrez votre Mot de passe"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>
    </form>

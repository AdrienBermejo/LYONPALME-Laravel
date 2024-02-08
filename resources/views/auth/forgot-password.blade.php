<link rel="stylesheet" href="{{ asset ('css/forgotpassword.css')}}">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <a href="{{ url('accueil') }}">
        <img src="{{ asset('css/logo.png')}}" alt="Logo">
        </a>

        <div class="mb-4 text-sm text-gray-600">
        <p class="lbl">Vous avez oublié votre Mot de passe, renseignez votre adresse Email. </br> Nous enverrons un lien pour créer un nouveau Mot de passe</p>
    </div>
        <!-- Email Address -->
        <div>
            <p class="lbl">Email :</p>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Votre Email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Envoyer un lien au Mail') }}
            </x-primary-button>
        </div>
</form>

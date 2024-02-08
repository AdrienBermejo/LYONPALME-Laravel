<form method="POST" action="{{ route('register') }}">
    @csrf
    <link rel="stylesheet" href="{{ asset ('css/register.css')}}">
    <head>
    <title>Création du compte</title>
    <link rel="icon" href="{{ asset('css/img/icon.png') }}" type="image/png">
    </head>

        <!-- Name -->
    <a href="{{ url('accueil') }}">
    <img src="{{ asset('css/logo.png')}}" alt="Logo">
    </a>
    <div id="Donnees">
        <div id="Donnees_personnelles">
            <div class="mt-4">
                <p class="lbl">Nom :</p>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Votre Nom"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Surname -->
            <div class="mt-4">
                <p class="lbl">Prénom :</p>
                <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" placeholder="Votre Prénom"/>
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <!-- Téléphone -->
            <div class="mt-4">
                <p class="lbl">Téléphone :</p>
                <x-text-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required autofocus autocomplete="telephone" placeholder="Votre Téléphone"/>
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <p class="lbl">Email :</p>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Votre Email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>
        <div id="Donnees_entreprises">
            <!-- Nom Exploitation -->
            <div class="mt-4">
                <p class="lbl">Nom de l'exploitation:</p>
                <x-text-input id="Exploitation_name" class="block mt-1 w-full" type="text" name="Exploitation_name" :value="old('Exploitation_name')" required autofocus autocomplete="Exploitation_name" placeholder="Votre Exploitation"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- N° de SIRET -->
            <div class="mt-4">
                <p class="lbl">Numéro de SIRET :</p>
                <x-text-input id="SIRET" class="block mt-1 w-full" type="text" name="SIRET" :value="old('SIRET')" required autofocus autocomplete="SIRET" placeholder="Votre SIRET"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <p class="lbl">Mot de passe :</p>
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" 
                                placeholder="Créer un Mot de passe"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <p class="lbl">Confirmer le Mot de passe :</p>
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirmer votre Mot de passe" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
    </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Vous avez déjà un compte') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Enregistrer') }}
            </x-primary-button>
        </div>
</form>

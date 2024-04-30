<x-guest-layout>
<head>
    <title>Confirmation de Mot de passe</title>
    <link rel="icon" href="{{ asset('css/img/LogoLPMini.webp') }}" type="image/png">
</head>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('C\'est une page sécurisée. Veuillez renseignez votre Mot de passe avant de continuer.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

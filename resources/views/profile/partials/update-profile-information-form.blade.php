<section>
    <header>
        <h2 class="text-lg font-medium text-framboise">
            {{ __('Vos Informations') }}
        </h2>

        <p class="mt-1 text-sm text-framboise">
            {{ __("Modifier vos informations personnelles et d'entreprises") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" class="text-framboise" :value="__('Nom')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="firstname" class="text-framboise" :value="__('Prénom')" />
            <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $user->firstname)" required autofocus autocomplete="firstname" />
            <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
        </div>

        <div>
            <x-input-label for="telephone" class="text-framboise" :value="__('Téléphone')" />
            <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" :value="old('telephone', $user->telephone)" required autofocus autocomplete="telephone" />
            <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
        </div>

        <div>
            <x-input-label for="email" class="text-framboise" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-framboise">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-framboise">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="Exploitation_name" class="text-framboise" :value="__('Nom de l\'exploitation')" />
            <x-text-input id="Exploitation_name" name="Exploitation_name" type="text" class="mt-1 block w-full" :value="old('Exploitation_name', $user->Exploitation_name)" required autofocus autocomplete="Exploitation_name" />
            <x-input-error class="mt-2" :messages="$errors->get('Exploitation_name')" />
        </div>

        <div>
            <x-input-label for="SIRET" class="text-framboise" :value="__('Numéro de SIRET')" />
            <x-text-input id="SIRET" name="SIRET" type="text" class="mt-1 block w-full" :value="old('SIRET', $user->SIRET)" required autofocus autocomplete="SIRET" />
            <x-input-error class="mt-2" :messages="$errors->get('SIRET')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarde') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Modifié.') }}</p>
            @endif
        </div>
    </form>
</section>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-purple-700">
            {{ __('Supprimer votre compte') }}
        </h2>

        <p class="mt-1 text-sm text-purple-700">
            {{ __('Une fois votre compte supprimé, toutes les ressources et vos données seront supprimées de façon défénitive.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Supprimer Compte') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium font-folty text-purple-700">
                {{ __('Êtes vous sûr de vouloir supprimer votre compte ?') }}
            </h2>

            <p class="mt-1 text-sm text-purple-700">
                {{ __('Une fois votre compte supprimé, toutes les ressources et vos données seront supprimées de façon défénitive. Entrez votre Mot de passe afin de confirmer la suppression de votre compte.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Annuler') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Supprimer Compte') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

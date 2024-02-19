<x-app-layout>
    <div class="py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-lg p-7 font-medium text-framboise">
                    {{ __("Demande de rendez-vous") }}
                </div>
                    <div>
                    @if($appointements->isEmpty())
                        <p class="ps-5 py-5 font-folty text-framboise border-solid mb-4">Aucun rendez-vous à valider</p>
                    @else
                        @foreach($appointements as $appointement)
                            <div class="ps-5 py-5 font-folty text-framboise border-solid border-2 border-framboise mb-4">
                                <h1 class="text-framboisehover">{{ optional($appointement->user)->name ?? 'Pas de nom'}} {{ optional($appointement->user)->firstname ?? 'Pas de prénom'}}</h1>
                                <h1 class="text-framboisehover">Exploitation: {{ optional($appointement->user)->Exploitation_name ?? 'Pas de nom d exploitation' }}</h1>
                                <h2>Demande de rendez vous du {{\Carbon\Carbon::parse($appointement->horairedebut)->format('d/m/Y')}}</h2>
                                <h2> Début à {{ \Carbon\Carbon::parse($appointement ->horairedebut)->format('H:i') }} - Fin à {{ \Carbon\Carbon::parse($appointement-> horairefin)->format('H:i')}} </h2>
                                <h2>Téléphone : {{ optional($appointement->user)->telephone ?? 'Pas de téléphone'}} <br> Email : {{ optional($appointement->user)->email ?? 'Pas d email'}}</h2>
                                @if($appointement->Validation)
                                    <p>Validation: Validé</p>
                                    @else
                                        <p>Validation: Non validé</p>
                                @endif
                                <p> Votre Commentaire : {{ $appointement-> Commentaire ?? 'Pas encore de commentaire'}}</p>
                                
                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'appointement-edit-{{ $appointement->id }}')"
                                    >{{ __('Modifier') }}</x-danger-button>

                                <x-modal name="appointement-edit-{{ $appointement->id }}" focusable>
                                    <form method="post" action="{{ route('appointements.update', $appointement) }}" class="p-6">
                                        @csrf
                                        @method('patch')
                                        <div>
                                            <x-input-label for="horairedebut" :value="__('Horaire de début:')"/>
                                            <input type="datetime-local" id="horairedebut" name="horairedebut" value="{{ $appointement->horairedebut }}">

                                            <x-input-label for="horairefin" :value="__('Horaire de fin:')"/>
                                            <input type="datetime-local" id="horairefin" name="horairefin" value="{{ $appointement->horairefin }}">

                                            <x-input-label for="Validation" :value="__('Validation:')"/>
                                            <input type="checkbox" id="Validation" name="Validation" {{ $appointement->Validation ? 'checked' : '' }}>

                                            <x-input-label for="Commentaire" :value="__('Commentaire:')"/>
                                            <textarea id="Commentaire" name="Commentaire">{{ $appointement->Commentaire }}</textarea>
                                        </div>
                                        <div>
                                            <x-primary-button class="ms-3">
                                                {{ __('Mettre à jour') }}
                                            </x-primary-button>

                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>
                                        </div>
                                    </form>
                                </x-modal>

                                @if(!$appointement->Validation)
                                    <x-danger-button
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'appointement-delete-{{ $appointement->id }}')"
                                    >{{ __('X') }}</x-danger-button>

                                    <x-modal name="appointement-delete-{{ $appointement->id }}" focusable>
                                        <form method="post" action="{{ route('appointements.destroy', $appointement) }}" class="p-6">
                                            @csrf
                                            @method('delete')
                                            <div>
                                                <h2 class="text-lg font-medium font-folty text-framboise">
                                                    {{ __('Êtes vous sûr de vouloir supprimer votre rendez-vous ?') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-framboise">
                                                    {{ __('Une fois votre rendez-vous supprimé, vous ne pourrez pas le récuperer') }}
                                                </p>
                                            </div>
                                            <div>
                                                <x-danger-button class="ms-3">
                                                    {{ __('Supprimer Rendez-vous') }}
                                                </x-danger-button>

                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Annuler') }}
                                                </x-secondary-button>
                                            </div>
                                        </form>
                                    </x-modal>
                                @endif
                            </div>
                        @endforeach
                    @endif
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
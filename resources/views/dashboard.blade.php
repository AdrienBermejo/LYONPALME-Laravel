<x-app-layout>
    <div class="py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-lg p-7 font-medium text-purle-700">
                    {{ __("Historique des entrainements") }}
                </div>
                    <div>
                    @if($appointements->isEmpty())
                        <p class="ps-5 py-5 font-folty text-purle-700 border-solid mb-4">Vous n'avez aucun entrainement pour le moment</p>
                    @else
                        @foreach ($appointements as $appointement)
                            <div class="ps-5 py-5 font-folty text-purle-700 border-solid border-2 border-purle-700 mb-4">
                                <h2>Demande de rendez vous du {{\Carbon\Carbon::parse($appointement->horairedebut)->format('d/m/Y')}}</h2>
                                <h2> Début à {{ \Carbon\Carbon::parse($appointement ->horairedebut)->format('H:i') }} - Fin à {{ \Carbon\Carbon::parse($appointement-> horairefin)->format('H:i')}} </h2>
                                @if($appointement->Validation)
                                    <p>Validation: Validé</p>
                                @else
                                    <p>Validation: Non validé</p>
                                @endif
                                <p> Votre Commentaire : </p>
                                <p>{{ $appointement-> Comment ?? 'Veuillez renseigner votre demande au plus vite'}}</p>
                                <p> Commentaire de Terradouceurs : </p>
                                <p>{{ $appointement-> Commentaire ?? 'Pas encore de commentaire'}}</p>

                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal','appointement-edit-{{ $appointement->id }}')"
                                >{{ __('Modifier') }}</x-danger-button>

                                <x-modal name="appointement-edit-{{ $appointement->id }}" focusable>
                                    <form method="post" action="{{ route('appointements.updateComment', $appointement) }}" class="p-6">
                                        @csrf
                                        @method('patch')
                                        <div>
                                            <x-input-label for="Comment" :value="__('Votre Commentaire:')"/>
                                            <textarea id="Comment" name="Comment" class="resize-none w-full" oninput="this.style.height = ''; this.style.height
                                            = this.scrollHeight + 'px'">{{ $appointement->Comment }}</textarea>
                                        </div>
                                        <div class="flex justify-end">
                                            <x-primary-button class="ms-3">
                                                {{ __('Mettre à jour') }}
                                            </x-primary-button>

                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Annuler') }}
                                            </x-secondary-button>
                                        </div>
                                    </form>
                                </x-modal>

                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'appointement-delete-{{ $appointement->id }}')"
                                >{{ __('X') }}</x-danger-button>

                                    <x-modal name="appointement-delete-{{ $appointement->id }}" focusable>
                                        <form method="post" action="{{ route('appointements.deleteOwner', $appointement) }}" class="p-6">
                                            @csrf
                                            @method('delete')
                                            <div class="mb-4">
                                                <h2 class="text-lg font-medium font-folty text-purle-700">
                                                    {{ __('Êtes vous sûr de vouloir refuser l entrainement ?') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-purle-700">
                                                    {{ __('Une fois votre entrainement refusé, vous ne pourrez pas le récuperer') }}
                                                </p>
                                            </div>
                                            <div class="flex justify-end space-x-10">
                                                <x-danger-button class="ms-3">
                                                    {{ __('Refuser entrainement') }}
                                                </x-danger-button>

                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Annuler') }}
                                                </x-secondary-button>
                                            </div>
                                        </form>
                                    </x-modal>
                            </div>
                        @endforeach
                    @endif
                    </div>
            </div>
        </div>
    </div>
    
</x-app-layout>

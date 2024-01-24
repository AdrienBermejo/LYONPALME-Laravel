<x-app-layout>
    <div class="bg-gradient-to-r from-framboise via-white to-vert py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-lg p-7 font-medium text-framboise">
                    {{ __("Historique de prise de rendez vous") }}
                </div>
                    <div>
                        @empty ($appointements)
                            <p class="ps-5 py-5 font-folty text-framboise">Vous n'avez pas encore de rendez vous !</p>
                        @endempty
                        @foreach ($appointements as $appointement)
                            <div class="ps-5 py-5 font-folty text-framboise border-solid border-2 border-framboise">
                                <h2>Demande de rendez vous du {{\Carbon\Carbon::parse($appointement->horairedebut)->format('d/m/Y')}}</h2>
                                <h2> Début à {{ \Carbon\Carbon::parse($appointement ->horairedebut)->format('H:i') }} - Fin à {{ \Carbon\Carbon::parse($appointement-> horairefin)->format('H:i')}} </h2>
                                @if($appointement->Validation)
                                    <p>Validation: Validé</p>
                                @else
                                    <p>Validation: Non validé</p>
                                @endif
                                <p> Commentaire de Terradouceurs : {{ $appointement-> Commentaire}}</p>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
        <head>
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="fullcalendar/lang/fr.js"></script>
                <script src="fullcalendar/interaction.js"></script>
                <script>
                    var currentUserId = @json(auth()->user()->id);
                    var events = @json($events);
                    var filteredEvents = events.filter(function(event){
                        return event.validation === 1;
                    });
                    console.log(filteredEvents);
                    document.addEventListener('DOMContentLoaded', function () {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            locale:'fr',
                            weekNumbers: true,
                            initialView: 'timeGridWeek',
                            slotMinTime: '8:00:00',
                            slotMaxTime: '17:00:00',
                            slotDuration: '01:00:00',
                            allDaySlot: false,
                            expandRows:true,
                            hiddenDays:[0,6],
                            events:filteredEvents,
                            dateClick:function(info){
                                //on met la date d'aujourd'hui
                                let today = new Date();
                                //Les valeurs qui sont prises sont la case cliqué et 1h après pour la fin
                                let horairedebut= new Date(info.dateStr);
                                let horairefin= new Date(horairedebut.getTime()+ 60*60*1000);
                                //Pour formater les dates pour la confirmation
                                let options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' };
                                let formattedHorairedebut = horairedebut.toLocaleDateString('fr-FR', options);
                                let formattedHorairefin = horairefin.toLocaleDateString('fr-FR', options);
                                //Verifie si la date est passé ou non
                                if(horairedebut<today){return;}
                                //affiche une alert pour vérifier que l'utilisateur veut prendre rendez-vous
                                let confirmation = confirm("Etes vous sûr de vouloir prendre un rendez-vous du " + formattedHorairedebut + " au "+ formattedHorairefin + " ?"); 
                                if(confirmation) {
                                    //Formulaire pour prendre le rendez-vous
                                    $.ajax({
                                    url:'/appointements',
                                    type:'POST',
                                    data:{
                                        horairedebut:horairedebut.toISOString(),
                                        horairefin:horairefin.toISOString(),
                                    },
                                    headers:{
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success:function(response){
                                        if(response.success){
                                            alert("Rendez-vous pris en compte !");
                                        } else {
                                            alert("Erreur, le rendez-vous n'a pas été pris, veuillez réssayer");
                                        }
                                    },
                                    error:function(response){
                                        alert("Erreur, le rendez-vous n'a pas été pris, veuillez réssayer");
                                    }
                                });
                                }
                                
                                }
                        });
                            calendar.render();
                        });
                </script>
            @endpush
            <style>
                .fc-agendaWeek-view tr, .fc-agendaDay-view tr {height: 40px;}
            </style>
        </head>
    <body>
        <div class="p-8">
            <div class="bg-white" id="calendar"></div>
        </div>    
    </body>

</x-app-layout>
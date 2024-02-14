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
                                let horairedebut= new Date(info.dateStr);
                                let horairefin= new Date(horairedebut.getTime()+ 60*60*1000); 
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
                                alert("Vous avez choisi: " + horairedebut + " Heure de fin: " + horairefin);
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
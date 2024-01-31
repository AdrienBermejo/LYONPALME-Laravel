<x-app-layout>
        <head>
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
                <script src="fullcalendar/lang/fr.js"></script>
                <script src="fullcalendar/interaction.js"></script>
                <script src="https://ajax.googleapis.google.com/ajax/libs/jquery/3.5.1/jquery.min.js"><script>
                <script>
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
                            events: @json($events),
                            hiddenDays:[0,6],
                            dateClick:function(info){
                                let horairedebut= new Date(info.dateStr);
                                let horairefin= new Date(horairedebut.getTime()+ 60*60*1000); 
                                alert("Vous avez choisi: " + horairedebut + " Heure de fin: " + horairefin);

                                let horairedebutISO = horairedebut.toISOString();
                                let horairefinISO = horairefin.toISOString();

                                $.ajax({
                                    url:'{{ route("appointements.store") }}',
                                    type:'POST',
                                    data:{
                                        'horairedebut': horairedebutISO,
                                        'horairefin':horairefinISO
                                    },
                                    success: function(reponse){
                                        console.log('Donnée envoyée avec succès');
                                    }
                                    error: function(error){
                                        console.log('Erreu d envoie');
                                    }
                                })

                                
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
            <div id="calendar"></div>
        </div>    
    </body>

</x-app-layout>
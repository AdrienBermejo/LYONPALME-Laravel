<x-app-layout>
        <head>
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
                <script src="fullcalendar/lang/fr.js"></script>
                <script src="fullcalendar/interaction.js"></script>
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
                            hiddenDays:[0,6],
                            dateClick:function(info){
                                let horairedebut= new Date(info.dateStr);
                                let horairefin= new Date(horairedebut.getTime()+ 60*60*1000); 
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
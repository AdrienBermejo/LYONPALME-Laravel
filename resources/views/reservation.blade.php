<x-app-layout>
        <head>
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'timeGridWeek',
                            slotMinTime: '8:00:00',
                            slotMaxTime: '17:00:00',
                            events: @json($events),
                        });
                            calendar.render();
                        });
                </script>
            @endpush
        </head>
    <body>
        <div id="calendar"></div>    
    </body>

</x-app-layout>
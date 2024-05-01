<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Lyon Palme</title>
    <link rel="icon" href="{{ asset('css/img/LogoLPMini.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="fullcalendar/lang/fr.js"></script>
                <script src="fullcalendar/interaction.js"></script>
                <script>
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
    <!-- Header -->
    @include('partials.header')

    <!-- Produits Section -->
    @include('partials.products', ['products' => $products])

    <!-- Objectif Section -->
    @include('partials.objectif')

    <!-- Cofinanceur Section -->
    @include('partials.cofinanceur', ['cofinanceurs' => $cofinanceurs])

    <!-- Partenaire Section -->
    @include('partials.partenaire', ['partners' => $partners])

    @include('partials.footer')
</html>

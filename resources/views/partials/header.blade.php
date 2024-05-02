<section id="container">
    <header>
    <div class="logo-menu">
        <div class="logo1">
            <img src="{{ asset('css/img/LogoLPMini.webp') }}" alt="Logo1">
        </div>
        <ul class="menu">
            <li><a href="#">Accueil</a></li>
            <li><a href="#Activites">Activités</a></li>
            <li><a href="#Agenda">Agenda du club</a></li>
            <li><a href="#Galerie">Galerie-Le club en photos</a></li>
            <li><a href="#Autre">Autre</a></li>
        </ul>
    </div>
    <div class="auth">
    @if(auth()->check())
        <a href="{{ route('profile.edit') }}">{{ auth()->user()->firstname }} {{ auth()->user()->name }}</a>
        <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Déconnexion') }}
        </x-dropdown-link>
    @else
        <a href="{{ route('login') }}">Connexion</a>
        <a href="{{ route('register') }}">Inscription</a>
    @endif
    </div>
    </header>
    <div class="text-button-container">
        <div class="logo">
            <img src="{{ asset('css/logo.png') }}" alt="Logo">
        </div>
        <div class="text-button">
            <p>La conserverie engagée<br>de Lyon et du Rhône !</p>
        </div>
        <div class="button-container">
            <button class="button">Voir les produits</button>
        </div>
    </div>

    <script>
    window.addEventListener('scroll', function() {
        var header = document.querySelector('header');
        var scrollY = window.scrollY;

        if (scrollY > 0) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    });
    </script>
</section>
<section id="container">
    <header>
    <div class="logo-menu">
        <div class="logo1">
            <img src="{{ asset('css/img/poterra.png') }}" alt="Logo1">
        </div>
        <ul class="menu">
            <li><a href="#">La Conserverie</a></li>
            <li><a href="#produits">Les Produits</a></li>
            <li><a href="#pointsvente">Les points de vente</a></li>
            <li><a href="#journal">Journal Douceur</a></li>
            <li><a href="#contact">Contact</a></li>
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
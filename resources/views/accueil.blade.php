<!DOCTYPE html>
<html lang="fr">
<head>
    <title>La conserverie engagée de Lyon et du Rhône</title>
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
</head>
<body>

<section id="container">
    <header>
    <div class="logo-menu">
        <div class="logo">
            <img src="{{ asset('css/logo.png') }}" alt="Logo">
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
        <span>{{ auth()->user()->first_name }} {{ auth()->user()->name }}</span>
        <a href="{{ route('logout') }}">Logout</a>
    @else
        <a href="{{ route('login') }}">Sign In</a>
        <a href="{{ route('register') }}">Sign Up</a>
    @endif
    </div>
    </header>
    <div class="text-button-container">
        <div class="text-button">
            <p>La conserverie engagée<br>de Lyon et du Rhône !</p>
        </div>
        <div class="button-container">
            <button class="button">Votre bouton</button>
        </div>
    </div>
</section>
</body>
</html>

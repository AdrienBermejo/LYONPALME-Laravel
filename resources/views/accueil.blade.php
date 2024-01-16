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
            <li><a href="#">Accueil</a></li>
            <li><a href="#a-propos">A Propos</a></li>
            <li><a href="#competences">Compétences</a></li>
            <li><a href="#experiences">Experiences</a></li>
            <li><a href="#Projets">Projets</a></li>
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

</section>
</body>
</html>

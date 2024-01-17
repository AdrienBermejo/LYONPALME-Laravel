<!DOCTYPE html>
<head>
    <title>La conserverie engagée de Lyon et du Rhône</title>
    <link rel="stylesheet" href="{{ asset ('css/dashboard.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
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
        <a href="{{ route ('dashboard') }}">{{ auth()->user()->firstname }} {{ auth()->user()->name }}</a>
        <a href="{{ route('logout') }}">Logout</a>
    @else
        <a href="{{ route('login') }}">Sign In</a>
        <a href="{{ route('register') }}">Sign Up</a>
    @endif
    </div>
    </header>    
<h1>
        {{ __("Vous êtes connecté !") }}
    </h1>
                

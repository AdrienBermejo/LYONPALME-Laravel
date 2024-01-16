<!DOCTYPE html>
<html lang="fr">
<head>
    <title>La conserverie engagée de Lyon et du Rhône</title>
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
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

<section id="produits">
<div class="product-slider">
    @foreach($products as $product)
        <div class="product">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
            <h2>{{ $product->title }}</h2>
            <p>{{ $product->is_bio ? 'Bio' : 'Non-bio' }}</p>
        </div>
    @endforeach
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.product-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
        });
    });
</script>
</section>
</body>
</html>

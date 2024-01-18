<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Terra Douceurs</title>
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
        <a>{{ auth()->user()->firstname }} {{ auth()->user()->name }}</a>
        <a href="{{ route('logout') }}">Déconnexion</a>
    @else
        <a href="{{ route('login') }}">Connexion</a>
        <a href="{{ route('register') }}">Inscription</a>
    @endif
    </div>
    </header>
    <div class="text-button-container">
        <div class="text-button">
            <p>La conserverie engagée<br>de Lyon et du Rhône !</p>
        </div>
        <div class="button-container">
            <button class="button">Voir les produits</button>
        </div>
    </div>
</section>

<section id="produits">
<div class="product-slider">
    @foreach($products as $product)
        <div class="product">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
            <div class="text-container">
                <h2>{{ $product->title }}</h2>
                <p>{{ $product->is_bio ? 'Bio' : 'Non-bio' }}</p>
            </div>
        </div>
    @endforeach
</div>

<button class="slick-prev">Précédent</button>
<button class="slick-next">Suivant</button>

<script type="text/javascript">
    $(document).ready(function(){
        $('.product-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            prevArrow: $('.slick-prev'),
            nextArrow: $('.slick-next'),
        });
    });
</script>
</section>
</body>
</html>

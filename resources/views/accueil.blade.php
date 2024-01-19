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
        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Déconnexion') }}
                            </x-dropdown-link>
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

<button class="slick-prev">&#10094;</button>
<button class="slick-next">&#10095;</button>

<script type="text/javascript">
    $(document).ready(function(){
        $('.product-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: $('.slick-prev'),
            nextArrow: $('.slick-next'),
            infinite: true,
        });
    });
</script>
</section>

<section class="objectif">
    <div class="logo">
        <img src="{{ asset('css/img/label.png') }}" alt="Logo">
    </div>
    <div class="separator"></div>
    <div class="content">
        <div class="left-content">
            <h1>Objectif</h1>
            <ul>
                <li>Vous gagnez du temps pour<br>gérer vos autres activités.</li>
                <li>Vous répondez aux normes<br>sanitaires et d'étiquettage en<br>vigueur.</li>
                <li>Vous avez la garantie d'un<br>traçabilité complète de vos<br>produits transformés.</li>
                <li>Vous diversifiez votre offre<br>produit.</li>
                <li>Vous avez jusqu'à 3 ans pour<br>vendre votre production.</li>
            </ul>
        </div>
        <div class="right-content">
            <h1>D'Autres Points</h1>
            <ul>
                <li>Vous disposez d'une offre complémentaire<br>pour vos circuits courts par lot d'environ<br>70kg de produits bruts (selon recette et<br>conditionnement).</li>
                <li>Vous limitez le gaspillage de votre<br>production agricole.</li>
                <li>Vous limitez l'empreinte carbone en<br>favorisant les circuits courts.</li>
                <li>Vous favorisez l'emploi de personnes<br>porteuses de handicaps cognitifs.</li>
            </ul>
        </div>
    </div>
</section>

<section id="cofinanceur">
<div class="cofinanceur-slider">
    @foreach($cofinanceurs as $cofinanceur)
        <div class="cofinanceur">
            <img src="{{ asset('storage/' . $cofinanceur->logo) }}" alt="{{ $cofinanceur->name }}">
        </div>
    @endforeach
</div>

<button class="slick-prev">&#10094;</button>
<button class="slick-next">&#10095;</button>

<script type="text/javascript">
    $(document).ready(function(){
        $('.cofinanceur-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: $('.slick-prev'),
            nextArrow: $('.slick-next'),
            infinite: true,
        });
    });
</script>
</section>

</body>
</html>

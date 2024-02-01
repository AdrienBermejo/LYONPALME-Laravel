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

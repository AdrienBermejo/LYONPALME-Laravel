<!-- resources/views/admin/index.blade.php -->

@extends('layouts.app')

@section('content')
<head>
    <!-- Inclusion du CSS pour la page d'administration -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<div class="container mt-4">
    <h1>Page d'administration</h1>

    <div class="row">
        <!-- Section pour ajouter un produit, un partenaire et un co-financeur -->
        <div class="col-md-8">
            <!-- Section pour ajouter un produit -->
            <div class="admin-block">
                <h2>Ajouter un produit</h2>
                <form action="/admin/products" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Logo</label>
                        <input type="file" class="form-control-file" id="image" name="image" required onchange="loadFile(event)">
                        <label for="image">Ajouter un fichier</label>
                        <img id="output" style="width: 200px; height: auto; display: none;"/>
                    </div>
                    <script>
                    var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src) // libérer de la mémoire
                        }
                        output.style.display = 'block';
                    };
                    </script>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="is_bio" name="is_bio">
                        <label class="form-check-label" for="is_bio">Produit Bio</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>

            <!-- Section pour ajouter un partenaire -->
            <div class="admin-block">
                <h2>Ajouter un partenaire</h2>
                <form action="/admin/partners" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control-file" id="logo" name="logo" required onchange="loadFile(event)">
                        <label for="logo">Ajouter un fichier</label>
                        <img id="output" style="width: 200px; height: auto; display: none;"/>
                    </div>
                    <script>
                    var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src) // libérer de la mémoire
                        }
                        output.style.display = 'block';
                    };
                    </script>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>

            <!-- Section pour ajouter un co-financeur -->
            <div class="admin-block">
                <h2>Ajouter un co-financeur</h2>
                <form action="/admin/cofinanceurs" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control-file" id="logo" name="logo" required onchange="loadFile(event)">
                        <label for="logo">Ajouter un fichier</label>
                        <img id="output" style="width: 200px; height: auto; display: none;"/>
                    </div>
                    <script>
                    var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src) // libérer de la mémoire
                        }
                        output.style.display = 'block';
                    };
                    </script>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>

        <!-- Section pour supprimer un élément -->
        <div class="col-md-3">
            <div class="admin-block">
                <h2>Supprimer un élément</h2>
                <form action="/admin/delete" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="type">Type d'élément</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Sélectionnez un type</option>
                            <option value="product">Produit</option>
                            <option value="partner">Partenaire</option>
                            <option value="cofinanceur">Co-financeur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id">Élément</label>
                        <select class="form-control" id="id" name="id" required>
                            <option value="">Sélectionnez un élément</option>
                            <!-- Les options seront ajoutées ici par JavaScript -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
    <script>
    // Stocker les données dans des variables JavaScript
    var products = @json($products);
    var partners = @json($partners);
    var cofinanceurs = @json($cofinanceurs);

    // Mettre à jour la liste des éléments lorsque le type d'élément est changé
    $('#type').change(function() {
        var type = $(this).val();
        var elements;

        // Choisir les éléments appropriés en fonction du type
        switch (type) {
            case 'product':
                elements = products;
                break;
            case 'partner':
                elements = partners;
                break;
            case 'cofinanceur':
            elements = cofinanceurs;
            break;
            default:
                elements = [];
        }

        // Vider la liste des éléments
        $('#id').empty();

        // Ajouter une option pour chaque élément
        $.each(elements, function(index, element) {
            $('#id').append(new Option(element.name, element.id));
        });
    });
    </script>
</div>
@endsection

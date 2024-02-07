<x-app-layout><!-- resources/views/admin/index.blade.php -->

<head>
    <!-- Inclusion du CSS pour la page d'administration -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<div class="container mt-4 ">
    <h1>Page d'administration</h1>

    <div class="row">
        <!-- Section pour ajouter un produit -->
        <div class="col-md-4">
            <div class="admin-block">
                <h2>Ajouter un produit</h2>
                <form action="/admin/products" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre</label><br>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Logo</label><br>
                        <input type="file" class="form-control-file" id="image" name="image" required onchange="loadFile(event)"><br>
                        <label class="no-margin" for="image">Ajouter un fichier</label>
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
        </div>

        <!-- Section pour supprimer un produit -->
        <div class="col-md-4">
            <div class="admin-block">
                <h2>Supprimer un produit</h2>
                <form class="deleteProductForm" action="/admin/delete/product" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="product_id">ID du produit</label><br>
                        <input type="number" class="form-control" id="product_id" name="id" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                <div class="message" style="display: none; color: green;"></div> <!-- Message de confirmation -->
            </div>
        </div>


        <!-- Section pour ajouter un partenaire -->
        <div class="col-md-4">
            <div class="admin-block">
                <h2>Ajouter un partenaire</h2>
                <form action="/admin/partners" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label><br>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label><br>
                        <input type="file" class="form-control-file" id="logo" name="logo" required onchange="loadFile(event)"><br>
                        <label class="no-margin" for="logo">Ajouter un fichier</label>
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

        
        <!-- Section pour supprimer un partenaire -->
        <div class="col-md-4">
            <div class="admin-block">
                <h2>Supprimer un partenaire</h2>
                <form action="/admin/delete/partner" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="partner_id">ID du partenaire</label><br>
                        <input type="number" class="form-control" id="partner_id" name="id" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>


        <!-- Section pour ajouter un co-financeur -->
        <div class="col-md-4">
            <div class="admin-block">
                <h2>Ajouter un co-financeur</h2>
                <form action="/admin/cofinanceurs" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label><br>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label><br>
                        <input type="file" class="form-control-file" id="logo" name="logo" required onchange="loadFile(event)"><br>
                        <label class="no-margin" for="logo">Ajouter un fichier</label>
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

        <!-- Section pour supprimer un co-financeur -->
        <div class="col-md-4">
            <div class="admin-block">
                <h2>Supprimer un co-financeur</h2>
                <form action="/admin/delete/cofinanceur" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="cofinanceur_id">ID du co-financeur</label><br>
                        <input type="number" class="form-control" id="cofinanceur_id" name="id" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>

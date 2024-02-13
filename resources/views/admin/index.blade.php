<x-app-layout><!-- resources/views/admin/index.blade.php -->

<head>
    <!-- Inclusion du CSS pour la page d'administration -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<div class="container mt-4">

    @if(session('success'))
    <div class="rounded-lg w-1/4 mx-auto text-white bg-vert p-5 relative">
        <p>{{ session('success') }}</p>
        <button class="absolute top-0 right-0 p-2" onclick="this.parentElement.style.display = 'none'">
            <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
            </svg>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="rounded-lg w-1/4 mx-auto text-white bg-vert p-5 relative">
        <p>{{ session('error') }}</p>
        <button class="absolute top-0 right-0 p-2" onclick="this.parentElement.style.display = 'none'">
            <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
            </svg>
        </button>
    </div>
    @endif


    <div class="row">
        <!-- Section pour ajouter un produit -->
        <div class="col-md-4">
            <div class="admin-block">
                <h2 class="titre_block">Ajouter un produit</h2>
                <form action="/admin/products" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titre</label><br>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group text-center"> <!-- Ajout de la classe text-center pour centrer le contenu -->
                        <label for="logo">Logo</label><br>
                        <label for="image" class="custom-file-upload" required>Ajouter une image</label>
                        <input type="file" class="form-control-file" id="image" name="image" required style="display: none;" onchange="loadProduct(event)">
                        <div class="text-center"> <!-- Ajout d'un conteneur text-center pour centrer l'image -->
                            <img id="outputproduct" class="mx-auto" style="width: 200px; height: auto; display: none;"> <!-- Ajout de la classe mx-auto pour centrer l'image -->
                        </div>
                        <span id="file-name"></span>
                    </div>
                    <script>
                    var loadProduct = function(event) {
                        var output = document.getElementById('outputproduct');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src)
                        }
                        output.style.display = 'block';
                    };
                    document.getElementById('image').addEventListener('change', function() {
                        document.getElementById('file-name').textContent = this.files[0].name;
                    });
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
        <h2 class="titre_block">Supprimer un produit</h2>
        <form id="deleteProductForm" action="/admin/delete/product" method="POST">
            @csrf
            <div class="form-group">
                <label for="product_id">ID du produit</label><br>
                <input type="number" class="form-control" id="product_id" name="id" required>
            </div>
            <div class="flex items-center gap-4">
                <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
                <p id="message" style="display: none; color: green;"></p> <!-- Message de confirmation -->
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('deleteProductForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var form = this;
    var message = document.getElementById('message');

    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        // Afficher le message de confirmation
        message.textContent = 'Suppression réussie !';
        message.style.display = 'block';

        // Cacher le message après 2 secondes
        setTimeout(function() {
            message.style.display = 'none';
        }, 2000);
    })
});
</script>



        <!-- Section pour ajouter un partenaire -->
        <div class="col-md-4">
            <div class="admin-block">
                <h2 class="titre_block">Ajouter un partenaire</h2>
                <form action="/admin/partners" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label><br>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="logo">Logo</label><br>
                        <label for="imagepartenaire" class="custom-file-upload" required>Ajouter une image</label>
                        <input type="file" class="form-control-file" id="imagepartenaire" name="imagepartenaire" required style="display: none;" onchange="loadPartenaire(event)">
                        <div class="text-center">
                            <img id="outputpartenaire" class="mx-auto" style="width: 200px; height: auto; display: none;">
                        </div>
                        <span id="file-name-produit"></span>
                    </div>
                    <script>
                    var loadPartenaire = function(event) {
                        var output = document.getElementById('outputpartenaire');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src) // libérer de la mémoire
                        }
                        output.style.display = 'block';
                    };
                    document.getElementById('imagepartenaire').addEventListener('change', function() {
                        document.getElementById('file-name-produit').textContent = this.files[0].name;
                    });
                    </script>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>

        
        <!-- Section pour supprimer un partenaire -->
        <div class="col-md-4">
            <div class="admin-block">
                <h2 class="titre_block">Supprimer un partenaire</h2>
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
                <h2 class="titre_block">Ajouter un co-financeur</h2>
                <form action="/admin/cofinanceurs" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label><br>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group text-center">
                        <label for="logo">Logo</label><br>
                        <label for="imagecofi" class="custom-file-upload" required>Ajouter une image</label>
                        <input type="file" class="form-control-file" id="imagecofi" name="imagecofi" required style="display: none;" onchange="loadCofi(event)">
                        <div class="text-center">
                            <img id="outputcofi" class="mx-auto" style="width: 200px; height: auto; display: none;">
                        </div>
                        <span id="file-name-cofi"></span>
                    </div>
                    <script>
                    var loadCofi = function(event) {
                        var output = document.getElementById('outputcofi');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src) // libérer de la mémoire
                        }
                        output.style.display = 'block';
                    };
                    document.getElementById('imagecofi').addEventListener('change', function() {
                        document.getElementById('file-name-cofi').textContent = this.files[0].name;
                    });
                    </script>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>

        <!-- Section pour supprimer un co-financeur -->
        <div class="col-md-4">
            <div class="admin-block">
                <h2 class="titre_block">Supprimer un co-financeur</h2>
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

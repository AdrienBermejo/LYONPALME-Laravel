<x-app-layout><!-- resources/views/admin/index.blade.php -->

<head>
    <!-- Inclusion du CSS pour la page d'administration -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<div class="container mt-4 ">
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

                    document.querySelector('.custom-file-upload').addEventListener('click', function() {
                        document.getElementById('image').click();
                    });

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
    .catch(error => {
        // Afficher le message d'erreur
        message.textContent = 'Erreur lors de la suppression : ' + error;
        message.style.display = 'block';
    });
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
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="image" name="image" required style="display: none;"><br>
                        <label for="logo">Logo</label><br>
                        <label class="custom-file-upload" for="image" required onchange="loadPartenaire(event)">Ajouter une image</label>
                        <img id="outputpartenaire" style="width: 200px; height: auto; display: none;"/>
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
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="image" name="image" required style="display: none;"><br>
                        <label for="logo">Logo</label><br>
                        <label class="custom-file-upload" for="image" required onchange="loadCofi(event)">Ajouter une image</label>
                        <img id="outputcofi" style="width: 200px; height: auto; display: none;"/>
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

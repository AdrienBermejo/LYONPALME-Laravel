<!-- resources/views/add-cofinanceur.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter un cofinanceur</title>
    <!-- Assurez-vous d'inclure le CSS de Bootstrap si vous voulez utiliser son style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
</head>
<body>
<div class="container mt-4">
    <h1>Ajouter un cofinanceur</h1>

    <form action="/accueil" method="POST" enctype="multipart/form-data">
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
</body>
</html>

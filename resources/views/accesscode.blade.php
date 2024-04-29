<!DOCTYPE html>
<html>
<head>
    <title>Accès Lyon Palme</title>
    <link rel="icon" href="{{ asset('css/img/LogoLPMini.webp') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/accesscode.css') }}">
</head>
<body>
    <form method="POST" action="/check-access">
        @csrf
        <img src="{{ asset('css/logo.png') }}" alt="Logo">
        <label for="access_code">Code d'accès :</label>
        <input type="password" id="access_code" name="access_code" placeholder="Entrez le code d'accès" required>
        <input type="submit" value="Envoyer">
    </form>
    

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    $('input[type="password"]').focus(function(){
        $(this).attr('placeholder','');
    }).blur(function(){
        $(this).attr('placeholder','Entrez le code d\'accès');
    });
    });
</script>
</body>
</html>

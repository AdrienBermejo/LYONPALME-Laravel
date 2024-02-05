@extends('layouts.app')

@section('content')
<div class="container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Accès non autorisé</div>

                <div class="card-body">
                    Désolé, il faut être administrateur pour accéder à cette page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

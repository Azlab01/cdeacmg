@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-default">   
            <div class="panel-heading">Fiche d'utilisateur</div>
            <div class="panel-body"> 
                <p>Email : {{ $user->email }}</p>
                <p>Nom : {{ $user->name }}</p>
                <p>Username : {{ $user->username }}</p>
                <p>Numero : {{ $user->numero }}</p>
                @if($user->admin == 1)
                    Administrateur
                @endif
            </div>
        </div>              
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection
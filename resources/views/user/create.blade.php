@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
        <br>
        <div class="panel panel-default">   
            <div class="panel-heading">Création d'un utilisateur</div>
            <div class="panel-body"> 
                <div class="col-sm-12">
                    {!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal panel']) !!}   
                    <!--div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::hidden('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                        {!! Form::hidden('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                    </div--> 
                    <div class="form-group {!! $errors->has('numero') ? 'has-error' : '' !!}">
                        {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Numero']) !!}
                        {!! $errors->first('numero', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('username') ? 'has-error' : '' !!}">
                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => "Nom d'utilisateur"]) !!}
                        {!! $errors->first('username', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot de passe']) !!}
                        {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmation mot de passe']) !!}
                    </div>
                    {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection

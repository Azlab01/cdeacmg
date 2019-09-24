@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#myModal"></span>
                    <span class="glyphicon glyphicon-refresh"  onclick ="location.reload();" ></span>
                    <span data-toggle="modal" data-target="#myModal2" class="glyphicon glyphicon-user"></span>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>nom</td>
                                <td>numero</td>
                                <td>Theme</td>
                                <td>Orateur</td>
                                <td>date demande</td>
                                <td>date livraison</td>
                                <td>date culte</td>
                                <td>nombre cd</td>
                                <td>Eng. par</td>
                                <td>option</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($commandes as $commande)
                            <tr>
                                <td>{{ $commande->id }}</td>
                                <td>{{ $commande->receiver }}</td>
                                <td>{{ $commande->numero }}</td>
                                <td>{{ $commande->theme }}</td>
                                <td>{{ $commande->predicateur }}</td>
                                
                                <td>{{ ($commande->created_at != null) ? $commande->created_at: null  }}</td>
                                
                                <td>{{ ($commande->date_livraison !== null) ? $commande->date_livraison: null  }}</td>
                                
                                <td>{{ ($commande->date_culte !== null) ? $commande->date_culte: null  }}</td>
                                
                                <td>{{ $commande->nbre }}</td>
                                <td>{{ $commande->recorder }}</td>
                                <td>
                                    <a href="{{ url('/home/')}}/livrer/{{ $commande->id }}" class="btn btn-warning">livrer</a>
                                    <a href="{{ url('/home/')}}/delete/{{ $commande->id }}" class="btn btn-danger " onclick ="return confirm('Vraiment supprimer cette commande ?')">supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $links !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ENREGISTRER UNE COMMANDE -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Ajouter</h4>
        </div>
        <div class="modal-body">
            <form action="{{ url('/home')}}" method="post" id="formRegister">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" name="theme" class="form-control" placeholder="theme" id="">
                        <small class="help-block"></small>
                    </div>
                    <div class="col-sm-6">
                     <input type="text" name="predicateur" class="form-control" placeholder="predicateur" id="">
                     <small class="help-block"></small>
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="">
                    <select name="user_id" class="form-control select2user" id="user"  data-placeholder="Choisir un utilisateur..."  tabindex="1">
                        <option value=""></option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }} - {{ $user->numero }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="number" name="nbre" class="form-control" placeholder="nombre" id="">
                        <small class="help-block"></small>
                    </div>
                    <div class="col-sm-6">
                       <input type="date" name="date_culte" class="form-control" placeholder="date du culte" id="">
                       <small class="help-block"></small>
                       <input type="hidden" name="recorder_id" class="form-control" value="{{Auth::user()->id}}" id="">
                       <input type="hidden" name="date_livraison" class="form-control" value="" id="">
                    </div>
                </div>
                <input type="submit" id="sub" value="Envoyer" class="btn btn-default">
                <p class="message help-block"></p>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>


<!-- ENREGISTRER UN UTILISATEUR -->

<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Ajouter un usager</h4>
        </div>
        <div class="modal-body">
            <form action="{{ url('/home/newuser')}}" method="post" id="formRegisterUser">
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" name="name" class="form-control vider" placeholder="nom" id="">
                        <small class="help-block"></small>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="numero" class="form-control vider" placeholder="numero" id="">
                        <small class="help-block"></small>
                    </div>
                </div>
                <input type="submit" id="sub" value="Envoyer" class="btn btn-default">
                <p class="message help-block"></p>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-plus"></span></h4>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>nom</td>
                                <td>numero</td>
                                <td>date demande</td>
                                <td>date livraison</td>
                                <td>date culte</td>
                                <td>nombre cd</td>
                                <td>Eng. par</td>
                                <td>option</td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Ajouter</h4>
        </div>
        <div class="modal-body">
            <form action="">
                {{ csrf_field() }}
                <select name="id_user" class="form-control" id="user">
                    <option value="0">0</option>
                    <option value="autre">autre</option>
                </select>
                <input type="text" name="name" class="form-control musthide hide" placelhoder="nom" id="">
                <input type="text" name="numero" class="form-control musthide hide" placelhoder="numero" id="">
                <input type="number" name="nbre" class="form-control" placelhoder="nombre" id="">
                <input type="date" name="date" class="form-control" placelhoder="date du culte" id="">
                <input type="submit" class="btn btn-default">
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
@endsection

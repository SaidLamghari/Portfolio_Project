@extends('adminlte::page')

@section('title', 'Afficher Blocs')

@section('content_header')

@section('content')


    <div class="col-sm-2">
        <div class="pull-right" style="margin-top: 20px;margin-bottom:20px">
            <a class="btn btn-success" href="{{ URL::previous() }}">Retour </a>
        </div>
    </div>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Reference Bloc <i class="fa fa-sort"></i></th>
                <th>Siege<i class="fa fa-sort"></i></th>
                <th>Nombre Fragments</th>
                <th>Nombre Cassettes<i class="fa fa-sort"></i></th>
                <th>Reste</th>
                <th>Decals</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <th>{{ $blocs->id }}</th>
                <th>{{ $blocs->Reference_Bloc }}</th>
                <th>{{ $blocs->Siege }}</th>
                <th>{{ $blocs->Cassettes }}</th>
                <th>{{ $blocs->Fragments }}</th>
                <th>{{ $blocs->Reste }}</th>
                <th>{{ $blocs->Decals }}</th>
            </tr>
        </tbody>
    </table>
    <div class="text-center" style="margin-top:50px">
        <label for="Commentaire" class="col-sm-2 col-form-label">Commentaire</label>
        <div style="margin:20px">
            <textarea class="form-control" name="commentaire" id="comment" disabled>{{ $blocs->Commentaire }}</textarea>
        </div>
    </div>

@endsection

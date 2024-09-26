@extends('adminlte::page')

@section('title', 'Afficher Blocs')

@section('content_header')

@section('content')
    <div>
        <h4>Date Manipulation</h4>
        <h2>Medecin Manipulateur </h2>
    </div>
  

   
    <table class="table table-striped table-hover table-bordered" >
        <thead>
            <tr>
                <th>#</th>
                <th>Reference Bloc <i class="fa fa-sort"></i></th>
                <th>Siege<i class="fa fa-sort"></i></th>
                <th>Nombre Fragments</th>
                <th>Nombre Cassettes<i class="fa fa-sort"></i></th>
                <th>Reste</th>
                <th>Decals</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
         
            @foreach($blocs as $bloc)
                <tr>
                    <th>{{$bloc->id}}</th>
                    <th>{{$bloc->reference_bloc}}</th>
                    <th>{{$bloc->siege}}</th>
                    <th>{{$bloc->nbr_cassettes}}</th>
                    <th>{{$bloc->nbr_frag}}</th>
                    <th>{{$bloc->Reste}}</th>
                    <th>{{$bloc->decals}}</th>
                    <th>Modifier</th>
            
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

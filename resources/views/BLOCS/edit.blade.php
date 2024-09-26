@extends('adminlte::page')

@section('title', 'Details Blocs')

@section('content_header')

    <h1> Details relatives au bloc : {{ $blocs->Reference_Bloc }}</h1>

@stop

@section('content')
    <div class="container mt-5">
        {{-- <div class="pull-left">
            <a class="btn btn-success" href="{{ URL::previous() }}">Retour </a>
        </div> --}}
        <form action="{{ route('Blocs.update', $blocs->id) }}" method="post">
            {{ csrf_field() }}
            @method('PUT')
          
            <div class="row mb-3">
                <label for="reference_bloc" class="col-sm-2 col-form-label">Reference Bloc</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="reference_bloc" id="reference_bloc"
                        value="{{ $blocs->Reference_Bloc }}">
                </div>
            </div>
            @if (Auth::user()->role == 'Medecin')
            <div class="row mb-3">
                <label for="nbr_cassettes" class="col-sm-2 col-form-label">Nombre Cassettes</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nbr_cassettes" name="nbr_cassettes"
                        value="{{ $blocs->Cassettes }}" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="nbr_frag" class="col-sm-2 col-form-label">Nombre Fragments</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nbr_frag" id="nbr_frag" value="{{ $blocs->Fragments }}" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="siege" class="col-sm-2 col-form-label">Siege</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="siege" id="siege" value="{{ $blocs->Siege }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="reste" class="col-sm-2 col-form-label">Reste</label>
                <div class="col-sm-10">
                    <input style="margin-left:50px;margin-right:20px;" name="reste" id="reste" type="radio" value="+"checked><b>+</b>
                    <input style="margin-left:50px;margin-right:20px;" name="reste" id="reste" type="radio" value="-" ><b>-</b>
                </div>
            </div>
            <div class="row mb-3">
                <label for="decals" class="col-sm-2 col-form-label">Decals</label>
                <div class="col-sm-10">
                    <input style="margin-left:50px;margin-right:20px;" name="decals" id="decals" type="radio" value="OUI"><b>+</b>
                    <input style="margin-left:50px;margin-right:20px;" name="decals" id="decals" type="radio" value="NON" checked><b>-</b>
                </div>
            </div>
            <div class="row mb-3">
                <label for="Commentaire" class="col-sm-2 col-form-label">Commentaire</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="commentaire" id="comment">{{ $blocs->Commentaire }}</textarea>
                </div>
            </div>
            @elseif (Auth::user()->role == 'Technicien')
            <div class="row mb-3">
                <label for="nbr_frag" class="col-sm-2 col-form-label">Nombre Fragments</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nbr_frag" id="nbr_frag" value="{{ $blocs->Fragments }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="decals" class="col-sm-2 col-form-label">Decals</label>
                <div class="col-sm-10">
                    <input style="margin-left:50px;margin-right:20px;" name="decals" id="decals" type="radio" value="OUI"><b>OUI</b>
                    <input style="margin-left:50px;margin-right:20px;" name="decals" id="decals" type="radio" value="NON" checked><b>NON</b>
                </div>
            </div>
            <div class="row mb-3">
                <label for="Commentaire" class="col-sm-2 col-form-label">Commentaire</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="commentaire" id="comment">{{ $blocs->Commentaire }}</textarea>
                </div>
            </div>
            @endif

            <button class="btn btn-primary" type="submit" method="post"> Modifier </button>
        </form>
    </div>

@endsection

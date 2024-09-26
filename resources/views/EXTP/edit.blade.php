@extends('adminlte::page')

@section('title', 'Edit Extemporanee')

@section('content_header')

    <h1>Détail prelevement</h1>

@stop

@section('content')
    <div class="container mt-5">
        <a class="btn btn-success" href="{{ route('Extp.index') }}">Retour </a>
        <form action="{{ route('Extp.update', $prelevement->id) }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="row mb-3">
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Numero Anapath</label>
                <div class="col-sm-10">
                    <input name="NumeroAnapath" type="text" class="form-control" id="numeroAnapath"
                        value="{{ $prelevement->NumeroAnapath }}" disabled>
                    @if ($errors->any('NumeroAnapath'))
                        <span class="text-danger">{{ $errors->first('NumeroAnapath') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <label for="organe" class="col-sm-2 col-form-label">Organe</label>
                <div class="col-sm-10">
                    <input name="organe" type="text" class="form-control" id="organe"
                        value="{{ $prelevement->Organe }}">
                    @if ($errors->any('organe'))
                        <span class="text-danger">{{ $errors->first('organe') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea style="height:200px" name="Description" class="form-control" id="description">{{ $prelevement->Description }}</textarea>
                    @if ($errors->any('Description'))
                        <span class="text-danger">{{ $errors->first('Description') }}</span>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th>reference_bloc</th>
                            <th>nbr_cassettes</th>
                            <th>nbr_frag</th>
                            <th>siege</th>
                            <th>Decals</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prelevement->blocs as $bloc)
                            <tr>
                                <td>{{ $bloc->Reference_Bloc }}</td>
                                <td>{{ $bloc->Cassettes }}</td>
                                <td>{{ $bloc->Fragments }}</td>
                                <td>{{ $bloc->Siege }}</td>
                                <td>{{ $bloc->Decals }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary" type="submit" method="post"> Modifier </button>
        </form>
    </div>

@endsection

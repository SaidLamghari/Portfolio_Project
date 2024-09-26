@extends('adminlte::page')  // Extends the adminlte page layout

@section('title', 'Edit Reprelevement')  // Sets the title for the edit page

@section('content_header')  // Section for the content header
    <h1>Détail prelevement</h1>  // Header for the detail view
@stop



@section('content')  // Main content section
    <div class="container mt-5">  // Container for the form with top margin
        <a class="btn btn-success" href="{{ route('Repr.index') }}">Retour </a>  // Back button to index page
        <form action="{{ route('Repr.update', $prelevement->id) }}" method="POST">  // Form submission route for updating
            {{ csrf_field() }}  // CSRF token for security
            @method('PUT')  // Specifies the method as PUT for updating
            <div class="row mb-3">  // Row for the Numero Anapath input
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Numero Anapath</label>  // Label for input
                <div class="col-sm-10">  // Column for input field
                    <input name="NumeroAnapath" type="text" class="form-control" id="numeroAnapath"  // Input for Anapath number
                        value="{{ $prelevement->NumeroAnapath }}" disabled>  // Disabled field for display
                    @if ($errors->any('NumeroAnapath'))  // Checks for validation errors
                        <span class="text-danger">{{ $errors->first('NumeroAnapath') }}</span>  // Displays error message
                    @endif
                </div>
            </div>
            <div class="row mb-3">  // Row for the Organe input
                <label for="organe" class="col-sm-2 col-form-label">Organe</label>  // Label for input
                <div class="col-sm-10">  // Column for input field
                    <input name="organe" type="text" class="form-control" id="organe"  // Input for Organe
                        value="{{ $prelevement->Organe }}">  // Populates field with current value
                    @if ($errors->any('organe'))  // Checks for validation errors
                        <span class="text-danger">{{ $errors->first('organe') }}</span>  // Displays error message
                    @endif
                </div>
            </div>
            <div class="row mb-3">  // Row for the Description textarea
                <label for="description" class="col-sm-2 col-form-label">Description</label>  // Label for textarea
                <div class="col-sm-10">  // Column for textarea
                    <textarea style="height:200px" name="Description" class="form-control" id="description">{{ $prelevement->Description }}</textarea>  // Textarea for Description
                    @if ($errors->any('Description'))  // Checks for validation errors
                        <span class="text-danger">{{ $errors->first('Description') }}</span>  // Displays error message
                    @endif
                </div>
            </div>
            <div class="row mb-3">  // Row for displaying the blocs table
                <table class="table table-striped">  // Table for displaying bloc details
                    <thead>  // Table header
                        <tr>
                            <th>reference_bloc</th>  // Column for bloc reference
                            <th>nbr_cassettes</th>  // Column for number of cassettes
                            <th>nbr_frag</th>  // Column for number of fragments
                            <th>siege</th>  // Column for siege
                            <th>Decals</th>  // Column for decals
                        </tr>
                    </thead>
                    <tbody>  // Table body
                        @foreach ($prelevement->blocs as $bloc)  // Loop through each bloc
                            <tr>
                                <td>{{ $bloc->Reference_Bloc }}</td>  // Displays bloc reference
                                <td>{{ $bloc->Cassettes }}</td>  // Displays number of cassettes
                                <td>{{ $bloc->Fragments }}</td>  // Displays number of fragments
                                <td>{{ $bloc->Siege }}</td>  // Displays siege
                                <td>{{ $bloc->Decals }}</td>  // Displays decals
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary" type="submit" method="post"> Modifier </button>  // Submit button for form
        </form>
    </div>

@endsection  // Ends the content section

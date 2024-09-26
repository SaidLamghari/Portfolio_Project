@extends('adminlte::page')  // Extends the adminlte page layout



@section('title', 'Detail Reprelevement')  // Sets the title for the detail view of the prélèvement



@section('content_header')  // Section for content header
    <h1>Détail prelevement</h1>  // Main heading for the detail page
@stop



@section('content')  // Main content section
    <div class="container mt-5">  // Container with top margin
        <div class="pull-right">  // Right-aligned button
            <a class="btn btn-success" href="{{ route('Repr.index') }}">Retour </a>  // Button to return to the index
        </div>
        <form action="" method="post">  // Form setup (action is empty, indicating no submission)
            <div class="row mb-3">  // Row for Numero Anapath
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Numero Anapath</label>  // Label for the field
                <div class="col-sm-10">  // Column for the input field
                    <input type="text" class="form-control" id="numeroAnapath"  // Input field for Anapath number
                        value="{{ $prelevement->NumeroAnapath }}" disabled>  // Disabled field displaying the value
                </div>
            </div>
            <div class="row mb-3">  // Row for Organe
                <label for="organe" class="col-sm-2 col-form-label">Organe</label>  // Label for the field
                <div class="col-sm-10">  // Column for the input field
                    <input type="text" class="form-control" id="organe" value="{{ $prelevement->Organe }}" disabled>  // Disabled field displaying the value
                </div>
            </div>
            <div class="row mb-3">  // Row for Description
                <label for="description" class="col-sm-2 col-form-label">Description</label>  // Label for the field
                <div class="col-sm-10">  // Column for the textarea
                    <textarea style="height:200px" class="form-control" id="description" disabled>{{ $prelevement->Description }}</textarea>  // Disabled textarea displaying the value
                </div>
            </div>
            <div class="row mb-3">  // Row for table of blocs
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
                                <td>{{ $bloc->Reference_Bloc }}</td>  // Display reference bloc
                                <td>{{ $bloc->Cassettes }}</td>  // Display number of cassettes
                                <td>{{ $bloc->Fragments }}</td>  // Display number of fragments
                                <td>{{ $bloc->Siege }}</td>  // Display siege
                                <td>{{ $bloc->Decals }}</td>  // Display decals
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
@endsection  // Ends the content section

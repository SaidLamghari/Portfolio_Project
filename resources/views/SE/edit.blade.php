@extends('adminlte::page')  <!-- Extend the adminlte layout for consistent styling -->

@section('title', 'Modifier Suite Extemporanée')  <!-- Set the page title -->

@section('content_header')  <!-- Section for the content header -->
    <h1>Détail prelevement</h1>  <!-- Header title for the modification page -->
@stop  <!-- End of content header section -->



@section('content')  <!-- Main content section -->
    <div class="container mt-5">  <!-- Container for the form with top margin -->
        <a class="btn btn-success" href="{{ route('SE.index') }}">Retour </a>  <!-- Button to go back to the index page -->
        
        <!-- Form to update the prelevement details -->
        <form action="{{ route('Prelevements.update', $prelevement->id) }}" method="POST">  
            {{ csrf_field() }}  <!-- CSRF token for security -->
            @method('PUT')  <!-- Specify the HTTP method as PUT for updating -->

            <div class="row mb-3">  <!-- Row for Numero Anapath input -->
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Numero Anapath</label>  <!-- Label for the input -->
                <div class="col-sm-10">  <!-- Column for the input field -->
                    <input name="NumeroAnapath" type="text" class="form-control" id="numeroAnapath"
                        value="{{ $prelevement->NumeroAnapath }}" disabled>  <!-- Input for Numero Anapath, disabled for editing -->
                    @if ($errors->any('NumeroAnapath'))  <!-- Check for any validation errors -->
                        <span class="text-danger">{{ $errors->first('NumeroAnapath') }}</span>  <!-- Display error message -->
                    @endif
                </div>
            </div>

            <div class="row mb-3">  <!-- Row for Organe input -->
                <label for="organe" class="col-sm-2 col-form-label">Organe</label>  <!-- Label for the input -->
                <div class="col-sm-10">  <!-- Column for the input field -->
                    <input name="organe" type="text" class="form-control" id="organe"
                        value="{{ $prelevement->Organe }}">  <!-- Input for Organe with pre-filled value -->
                    @if ($errors->any('organe'))  <!-- Check for any validation errors -->
                        <span class="text-danger">{{ $errors->first('organe') }}</span>  <!-- Display error message -->
                    @endif
                </div>
            </div>

            <div class="row mb-3">  <!-- Row for Description textarea -->
                <label for="description" class="col-sm-2 col-form-label">Description</label>  <!-- Label for the textarea -->
                <div class="col-sm-10">  <!-- Column for the textarea -->
                    <textarea style="height:200px" name="Description" class="form-control" id="description">{{ $prelevement->Description }}</textarea>  <!-- Textarea for Description with pre-filled value -->
                    @if ($errors->any('Description'))  <!-- Check for any validation errors -->
                        <span class="text-danger">{{ $errors->first('Description') }}</span>  <!-- Display error message -->
                    @endif
                </div>
            </div>

            <div class="row mb-3">  <!-- Row for displaying blocs in a table -->
                <table class="table table-striped">  <!-- Start of the table with striped rows -->
                    <thead>  <!-- Table header -->
                        <tr>
                            <th>reference_bloc</th>  <!-- Column for reference_bloc -->
                            <th>Nombre Cassettes</th>  <!-- Column for Nombre Cassettes -->
                            <th>Nombre Fragments</th>  <!-- Column for Nombre Fragments -->
                            <th>Siege</th>  <!-- Column for Siege -->
                            <th>Decals</th>  <!-- Column for Decals -->
                        </tr>
                    </thead>
                    <tbody>  <!-- Table body -->
                        @foreach ($prelevement->blocs as $bloc)  <!-- Loop through each bloc related to the prelevement -->
                            <tr>  <!-- Start of table row -->
                                <td>{{ $bloc->Reference_Bloc }}</td>  <!-- Cell for Reference Bloc -->
                                <td>{{ $bloc->Cassettes }}</td>  <!-- Cell for Nombre Cassettes -->
                                <td>{{ $bloc->Fragments }}</td>  <!-- Cell for Nombre Fragments -->
                                <td>{{ $bloc->Siege }}</td>  <!-- Cell for Siege -->
                                <td>{{ $bloc->Decals }}</td>  <!-- Cell for Decals -->
                            </tr>  <!-- End of table row -->
                        @endforeach
                    </tbody>
                </table>  <!-- End of table -->
            </div>

            <!-- Submit button to modify the prelevement details -->
            <button class="btn btn-primary" type="submit"> Modifier </button>  
        </form>  <!-- End of form -->
    </div>
@endsection  <!-- End of content section -->

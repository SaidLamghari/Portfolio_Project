@extends('adminlte::page')  <!-- Extend the adminlte layout for consistent styling -->

@section('title', 'Details Suite Extemporanée')  <!-- Set the page title -->

@section('content_header')  <!-- Section for the content header -->
    <h1>Détail Extemporanée</h1>  <!-- Main header for the detail page -->
@stop  <!-- End of content header section -->



@section('content')  <!-- Main content section -->
    <div class="container mt-5">  <!-- Main container with top margin -->
        <div class="pull-right">  <!-- Right-aligned container for the back button -->
            <a class="btn btn-success" href="{{ route('SE.index') }}">Retour </a>  <!-- Back button to return to the list -->
        </div>
        <form action="" method="post">  <!-- Form declaration (no action defined) -->
            <div class="row mb-3">  <!-- Row for Numero Anapath -->
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Numero Anapath</label>  <!-- Label for the input -->
                <div class="col-sm-10">  <!-- Column for the input field -->
                    <input type="text" class="form-control" id="numeroAnapath"  <!-- Input for Numero Anapath -->
                        value="{{ $prelevement->NumeroAnapath }}" disabled>  <!-- Pre-filled value and disabled for editing -->
                </div>
            </div>
            <div class="row mb-3">  <!-- Row for Organe -->
                <label for="organe" class="col-sm-2 col-form-label">Organe</label>  <!-- Label for Organe input -->
                <div class="col-sm-10">  <!-- Column for the input field -->
                    <input type="text" class="form-control" id="organe"  <!-- Input for Organe -->
                        value="{{ $prelevement->Organe }}" disabled>  <!-- Pre-filled value and disabled for editing -->
                </div>
            </div>

            
            <div class="row mb-3">  <!-- Row for Description -->
                <label for="description" class="col-sm-2 col-form-label">Description</label>  <!-- Label for Description textarea -->
                <div class="col-sm-10">  <!-- Column for the textarea -->
                    <textarea style="height:200px" class="form-control" id="description" disabled>{{ $prelevement->Description }}</textarea>  <!-- Textarea for Description, disabled -->
                </div>
            </div>
            <div class="row mb-3">  <!-- Row for the table displaying blocs -->
                <table class="table table-striped">  <!-- Start of the table with striped styling -->
                    <thead>  <!-- Table header section -->
                        <tr>
                            <th>reference_bloc</th>  <!-- Column header for reference_bloc -->
                            <th>nbr_cassettes</th>  <!-- Column header for number of cassettes -->
                            <th>nbr_frag</th>  <!-- Column header for number of fragments -->
                            <th>siege</th>  <!-- Column header for siege -->
                            <th>Decals</th>  <!-- Column header for decals -->
                        </tr>
                    </thead>
                    <tbody>  <!-- Table body section -->
                        @foreach ($prelevement->blocs as $bloc)  <!-- Loop through each bloc associated with the prelevement -->
                            <tr>  <!-- Start of a new row for each bloc -->
                                <td>{{ $bloc->Reference_Bloc }}</td>  <!-- Display reference_bloc value -->
                                <td>{{ $bloc->Cassettes }}</td>  <!-- Display number of cassettes -->
                                <td>{{ $bloc->Fragments }}</td>  <!-- Display number of fragments -->
                                <td>{{ $bloc->Siege }}</td>  <!-- Display siege value -->
                                <td>{{ $bloc->Decals }}</td>  <!-- Display decals value -->
                            </tr>  <!-- End of the bloc row -->
                        @endforeach  <!-- End of the foreach loop -->
                    </tbody>
                </table>  <!-- End of the table -->
            </div>
        </form>  <!-- End of the form -->
    </div>  <!-- End of main container -->
@endsection  <!-- End of content section -->

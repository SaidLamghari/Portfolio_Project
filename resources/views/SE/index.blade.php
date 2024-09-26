@extends('adminlte::page')  <!-- Extend the adminlte layout for consistent styling -->



@section('title', 'Suite Extemporanée')  <!-- Set the page title -->



@section('content_header')  <!-- Section for the content header -->
    <!-- No specific content for the header in this section -->
@stop  <!-- End of content header section -->



@section('content')  <!-- Main content section -->
    <style>
        .search-box {  /* Styling for the search box container */
            position: relative;
            display: flex;
        }
        .search-box input {  /* Styling for the search input field */
            height: 34px;
            border-radius: 20px;
            padding-left: 35px;
            border-color: #ddd;
            box-shadow: none;
            margin-right: 10px;
        }
        .search-box input:focus {  /* Focus state styling for the input field */
            border-color: #3FBAE4;
        }
        .search-box i {  /* Styling for the search icon */
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }
        #eye { color: blueviolet; }  /* Color for the view icon */
        #edit { color: darkorange; }  /* Color for the edit icon */
        #trash { color: red; }  /* Color for the delete icon */
    </style>



    <div class="container">  <!-- Main container for the page content -->
        @if ($message = Session::get('success'))  <!-- Check if there’s a success message in the session -->
            <div class="alert alert-success">  <!-- Success alert box -->
                <p>{{ $message }}</p>  <!-- Display the success message -->
            </div>
        @elseif ($message = Session::get('deleted'))  <!-- Check if there’s a deleted message -->
            <div class="alert alert-danger">  <!-- Danger alert box -->
                <p>{{ $message }}</p>  <!-- Display the deleted message -->
            </div>
        @endif

        <div class="row justify-content-center">  <!-- Row to center content -->
            <div class="col-md-12">  <!-- Full-width column -->
                <div class="card">  <!-- Bootstrap card for content -->
                    <div class="card-header">  <!-- Card header section -->
                        <div class="d-flex justify-content-between">  <!-- Flexbox for spacing -->
                            <div> </div>  <!-- Empty div for spacing -->
                            @if (Auth::user()->role == 'Medecin')  <!-- Check if the user role is 'Medecin' -->
                                <div class="pull-right">  <!-- Right-aligned button -->
                                    <a class="btn btn-success" href="{{ route('SE.create') }}"> Ajouter Prelevement</a>  <!-- Button to add a new prelevement -->
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">  <!-- Card body section -->
                        <div class="table-title">  <!-- Title for the table section -->
                            <div class="row">  <!-- Row for layout -->
                                <div class="col-sm-6">  <!-- Left column for title -->
                                    <h5>Demandes du Jour /<a href="{{ route('SE.index') }}">Suite Extemporanée</a></h5>  <!-- Title with a link -->
                                </div>
                                <div class="col-sm-6">  <!-- Right column for search box -->
                                    <form class="search-box" method="GET" action="{{ route('SE.search') }}">  <!-- Search form -->
                                        <i class="fa fa-search"></i>  <!-- Search icon -->
                                        <input type="text" class="form-control" name="query" placeholder="Search&hellip;">  <!-- Search input field -->
                                        <button class="btn btn-primary" type="submit">Search</button>  <!-- Search button -->
                                    </form>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped table-hover table-bordered">  <!-- Start of the data table -->
                            <thead>  <!-- Table header section -->
                                <tr>
                                    <th class="text-center">N° d'ordre</th>  <!-- Column for Order Number -->
                                    <th class="text-center">N°Anapath</th>  <!-- Column for Anapath Number -->
                                    <th class="text-center">Organe</th>  <!-- Column for Organe -->
                                    <th class="text-center">Service</th>  <!-- Column for Service -->
                                    <th class="text-center">Medecin Manipulateur</th>  <!-- Column for Manipulating Doctor -->
                                    <th class="text-center">Date Manipulation</th>  <!-- Column for Manipulation Date -->
                                    <th class="text-center">Nombre Blocs</th>  <!-- Column for Number of Blocs -->
                                    @if (Auth::user()->role == 'Medecin')  <!-- Check if user role is 'Medecin' -->
                                        <th>Action</th>  <!-- Column for Action buttons -->
                                    @endif
                                </tr>
                            </thead>

                            <tbody>  <!-- Table body section -->
                                @foreach ($prelevements as $pre)  <!-- Loop through each prelevement -->
                                    <tr>  <!-- Start of a new row -->
                                        <td class="text-center">{{ $pre->id }}</td>  <!-- Display Order Number -->
                                        <td class="text-center">{{ $pre->NumeroAnapath }}</td>  <!-- Display Anapath Number -->
                                        <td class="text-center">{{ $pre->Organe }}</td>  <!-- Display Organe -->
                                        <td class="text-center">
                                            {{ $pre->service->Nom ?? ' Nom de service introuvable' }}  <!-- Display Service name or error message -->
                                        </td>
                                        <td class="text-center">Dr.{{ $pre->user->name }}</td>  <!-- Display Doctor's name -->
                                        <td class="text-center">{{ $pre->DateManipulation }}</td>  <!-- Display Manipulation Date -->
                                        <td class="text-center">{{ $pre->NombreBlocs }}</td>  <!-- Display Number of Blocs -->
                                        @if (Auth::user()->role == 'Medecin')  <!-- Check if user role is 'Medecin' -->
                                            <td>  <!-- Start of Actions column -->
                                                <a href="{{ route('SE.show', $pre->id) }}" class="text-primary"
                                                    title="View" data-toggle="tooltip"><i id="eye" class="fa fa-eye"></i></a>  <!-- View icon -->
                                                <a href="{{ route('SE.edit', $pre->id) }}" class="text-success"
                                                    title="Edit" data-toggle="tooltip"><i id="edit" class="fa fa-edit"></i></a>  <!-- Edit icon -->
                                                <a href="{{ route('SE.destroy', $pre->id) }}" class="delete"
                                                    title="Delete" data-toggle="tooltip"><i id="trash"
                                                        class="fa fa-trash"></i></a>  <!-- Delete icon -->
                                            </td>
                                        @endif
                                    </tr>  <!-- End of row -->
                                @endforeach
                            </tbody>
                        </table>  <!-- End of data table -->
                    </div>
                    <div class="card-footer">  <!-- Card footer section -->
                        {{ $prelevements->links() }}  <!-- Pagination links for the table -->
                    </div>
                </div>  <!-- End of card -->
            </div>
        </div>
    </div>
@endsection  <!-- End of content section -->

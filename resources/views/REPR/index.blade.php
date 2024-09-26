@extends('adminlte::page')  // Extends the adminlte page layout

@section('title', 'Reprelevements')  // Sets the title for the Reprelevements page

@section('content_header')  // Section for content header (currently empty)
@stop

@section('content')  // Main content section
    <style>
        .search-box {  // Styles for the search box
            position: relative;
            display: flex;
        }

        .search-box input {  // Styles for the input field in the search box
            height: 34px;
            border-radius: 20px;  // Rounded corners for the input
            padding-left: 35px;  // Padding for left side
            border-color: #ddd;  // Light gray border color
            box-shadow: none;  // No shadow effect
            margin-right: 10px;  // Margin to the right
        }

        .search-box input:focus {  // Styles for input field on focus
            border-color: #3FBAE4;  // Change border color when focused
        }

        .search-box i {  // Styles for the search icon
            color: #a0a5b1;  // Light gray color for the icon
            position: absolute;  // Absolute positioning
            font-size: 19px;  // Font size for the icon
            top: 8px;  // Position from top
            left: 10px;  // Position from left
        }

        #eye { color: blueviolet; }  // Color for the eye icon
        #edit { color: darkorange; }  // Color for the edit icon
        #trash { color: red; }  // Color for the trash icon
    </style>
    <div class="container">  // Container for the main content
        @if ($message = Session::get('success'))  // Check for success message
            <div class="alert alert-success">  // Alert for success
                <p>{{ $message }}</p>  // Display success message
            </div>
        @elseif ($message = Session::get('deleted'))  // Check for deletion message
            <div class="alert alert-danger">  // Alert for deletion
                <p>{{ $message }}</p>  // Display deletion message
            </div>
        @endif
        <div class="row justify-content-center">  // Centered row
            <div class="col-md-12">  // Full-width column
                <div class="card">  // Card component for styling
                    <div class="card-header">  // Header of the card
                        <div class="d-flex justify-content-between">  // Flexbox layout
                            <div></div>  // Placeholder for spacing
                            @if (Auth::user()->role == 'Medecin')  // Check if user is a Medecin
                                <div class="pull-right">  // Right-aligned button
                                    <a class="btn btn-success" href="{{ route('Repr.create') }}"> Ajouter Prelevement</a>  // Button to add prélèvement
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">  // Body of the card
                        <div class="table-title">  // Title section for the table
                            <div class="row">  // Row for layout
                                <div class="col-sm-6">  // Left column for title
                                    <h5>Demandes du Jour/<a href="{{ route('Repr.index') }}">Reprelevements</a></h5>  // Title with link to index
                                </div>
                                <div class="col-sm-6">  // Right column for search
                                    <form class="search-box" method="GET" action="{{ route('Repr.search') }}">  // Search form
                                        <i class="fa fa-search"></i>  // Search icon
                                        <input type="text" class="form-control" name="query" placeholder="Search&hellip;">  // Input field for search query
                                        <button class="btn btn-primary" type="submit">Search</button>  // Submit button for search
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered">  // Table for displaying prélèvements
                            <thead>  // Table header
                                <tr>
                                    <th class="text-center">#</th>  // ID column
                                    <th class="text-center">N°Anapath</th>  // Anapath number column
                                    {{-- <th class="text-center">Organe</th>
                                    <th class="text-center">Service</th> --}}
                                    <th class="text-center">Medecin Manipulateur</th>  // Manipulating doctor column
                                    <th class="text-center">Date Manipulation</th>  // Date of manipulation column
                                    <th class="text-center">Nombre Blocs</th>  // Number of blocs column
                                    @if (Auth::user()->role == 'Medecin')  // Check if user is a Medecin
                                        <th>Action</th>  // Action column for buttons
                                    @endif
                                </tr>
                            </thead>
                            <tbody>  // Table body
                                @foreach ($prelevements as $pre)  // Loop through each prélèvement
                                    <tr>
                                        <td class="text-center">{{ $pre->id }}</td>  // Display ID
                                        <td class="text-center">{{ $pre->NumeroAnapath }}</td>  // Display Anapath number
                                        {{-- <td class="text-center">{{ $pre->Organe }}</td>
                                        <td class="text-center">
                                            {{ $pre->service->Nom ?? ' Nom de service not found' }}
                                        </td> --}}
                                        <td class="text-center">Dr.{{ $pre->user->name }}</td>  // Display manipulating doctor
                                        <td class="text-center">{{ $pre->DateManipulation }}</td>  // Display manipulation date
                                        <td class="text-center">{{ $pre->NombreBlocs }}</td>  // Display number of blocs
                                        @if (Auth::user()->role == 'Medecin')  // Check if user is a Medecin
                                            <td>  // Actions cell
                                                <a href="{{ route('Repr.show', $pre->id) }}" class="text-primary" title="View" data-toggle="tooltip"><i id="eye" class="fa fa-eye"></i></a>  // View button
                                                <a href="{{ route('Repr.edit', $pre->id) }}" class="text-success" title="Edit" data-toggle="tooltip"><i id="edit" class="fa fa-edit"></i></a>  // Edit button
                                                <a href="{{ route('Repr.destroy', $pre->id) }}" class="delete" title="Delete" data-toggle="tooltip"><i id="trash" class="fa fa-trash"></i></a>  // Delete button
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">  // Footer of the card
                        {{ $prelevements->links() }}  // Pagination links for the table
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  // Ends the content section

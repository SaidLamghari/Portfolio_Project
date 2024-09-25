@extends('adminlte::page')

@section('title', 'Prelevements') <!-- Set the title of the page -->

@section('content_header')
<!-- You can add content for the header here if needed -->
@stop

@section('content')
    <style>
        /* Styles for the search box */
        .search-box {
            position: relative;
            display: flex;
        }

        .search-box input {
            height: 34px;
            border-radius: 20px;
            padding-left: 35px; /* Space for the search icon */
            border-color: #ddd;
            box-shadow: none;
            margin-right: 10px;
        }

        .search-box input:focus {
            border-color: #3FBAE4; /* Change border color on focus */
        }

        .search-box i {
            color: #a0a5b1; /* Color for the search icon */
            position: absolute;
            font-size: 19px;
            top: 8px; /* Position of the icon */
            left: 10px; /* Position of the icon */
        }
    </style>

    <div class="container">
        <!-- Display success or warning messages based on session data -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('deleted'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h2> Liste des prelevements </h2> <!-- Title for the list -->
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Additional content can be added here -->
                                </div>

                                <div class="col-sm-6">
                                    <!-- Search form -->
                                    <form class="search-box" method="GET" action="{{ route('Prelevement.search') }}">
                                        <i class="fa fa-search"></i> <!-- Search icon -->
                                        <input type="text" class="form-control" name="query" placeholder="Search&hellip;">
                                        <button class="btn btn-primary" type="submit">Search</button> <!-- Search button -->
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Table for displaying data -->
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">N°Anapath</th>
                                        <th class="text-center">Organe</th>
                                        <th class="text-center">Service</th>
                                        <th class="text-center">Medecin/Technicien Manipulateur</th>
                                        <th class="text-center">Date Manipulation</th>
                                        <th class="text-center">Nombre Blocs</th>
                                        <th class="text-center">Nombre Biopsie</th>
                                        <th class="text-center">Type</th>
                                        {{-- Uncomment the following section if actions are needed for 'Medecin' role --}}
                                        {{-- @if (Auth::user()->role == 'Medecin')
                                            <th>Action</th>
                                        @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prelevements as $pre) <!-- Loop through each 'prelevement' -->
                                        <tr>
                                            <td class="text-center">{{ $pre->id }}</td>
                                            <td class="text-center">{{ $pre->NumeroAnapath }}</td>
                                            <td class="text-center">{{ $pre->Organe }}</td>
                                            <td class="text-center">{{ $pre->service->Nom ?? 'Nom de service not found' }}</td>

                                            @if ($pre->user->role == 'Medecin')
                                                <td class="text-center">Dr. {{ $pre->user->name }}</td> <!-- Display doctor name -->
                                            @else
                                                <td class="text-center">{{ $pre->user->name }}</td> <!-- Display technician name -->
                                            @endif

                                            <td class="text-center">{{ $pre->DateManipulation }}</td>
                                            <td class="text-center">{{ $pre->NombreBlocs }}</td>
                                            <td class="text-center">{{ $pre->NombreBiopsie ?? '--' }}</td>
                                            <td class="text-center">{{ $pre->Type }}</td>
                                            {{-- Uncomment the following section if actions are needed for 'Medecin' role --}}
                                            {{-- @if (Auth::user()->role == 'Medecin')
                                                <td>
                                                    <form action="{{ route('Bio.destroy', $pre->id) }}" method="Post">
                                                        <a href="{{ route('Bio.show', $pre->id) }}" class="text-primary" title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ route('Bio.edit', $pre->id) }}" class="text-success" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-danger" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            @endif --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="text-center">
                                <!-- Button to print the page -->
                                <button onclick="window.print()" class="hide-from-printer" name="print">Imprimer</button>
                                <style>
                                    @media print {
                                        /* Styles to hide elements when printing */
                                        .hide-from-printer { display: none; }
                                        .search-box { display: none; }
                                    }
                                </style>
                            </div>
                        </div>
                        
                        <!-- Pagination links -->
                        <div class="card-footer">
                            {{ $prelevements->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

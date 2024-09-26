@extends('adminlte::page')  // Extends the adminlte page layout

@section('title', 'Ajouter Reprelevement')  // Sets the title for the page

@section('content_header')  // Section for content header (currently empty)

@stop

@section('content')  // Main content section
    <div class="container">  // Container for the form layout
        <div class="row justify-content-center">  // Centers the row
            <div class="col-md-12">  // Full-width column
                <div class="card">  // Card component for styling
                    <div class="card-header">  // Header of the card
                        <div class="d-flex justify-content-between">  // Flexbox for layout
                            <div> Ajouter Prelevements</div>  // Title for adding prélèvements
                            <div class="pull-right">  // Right-aligned button
                                <a class="btn btn-success" href="{{ route('Repr.index') }}">Retour </a>  // Back button to the index page
                            </div>
                        </div>
                        @php
                        $year = substr(date('y'), -2);  // Gets the last two digits of the current year
                        $na=$year .(idate('m'));  // Concatenates year with current month
                        @endphp

                        <div class="card-body">  // Main body of the card
                            <form action="{{ route('Repr.store') }}" method="POST" enctype="multipart/form-data">  // Form submission route and method
                                @csrf  // CSRF token for security
                                <div class="form-group">  // Form group for layout
                                    <label for="NumeroAnapath">Numero d'Anapath</label>  // Label for input field
                                    <input type="text" name="NumeroAnapath" class="form-control">  // Input field for Anapath number

                                    @if ($errors->any('NumeroAnapath'))  // Checks for validation errors
                                        <span class="text-danger">{{ $errors->first('NumeroAnapath') }}</span>  // Displays the error message
                                    @endif
                                </div>

                                @php
                                    $today = date('Y-m-d');  // Gets today's date in Y-m-d format
                                @endphp

                                <div class="form-group pmd-textfield pmd-textfield-floating-label" data-provide="datepicker">  // Date input field with datepicker
                                    <label class="control-label" for="dater">Select Date</label>  // Label for the date input
                                    <input type="date" class="form-control" id="datepicker" name="date" value=@php echo $today; @endphp>  // Date input with default value as today
                                    <div class="input-group-addon">  // Add-on for datepicker
                                        <span class="glyphicon glyphicon-th"></span>  // Icon for datepicker
                                        @if ($errors->any('date'))  // Checks for validation errors
                                            <span class="text-danger">{{ $errors->first('date') }}</span>  // Displays the error message
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">  // Form group for block count input
                                    <label for="NombreBlocs">Nombre Blocs</label>  // Label for the input field
                                    <input type="text" class="form-control" id="NombreBlocs" placeholder="Nombre Blocs" name="NombreBlocs" value="{{ old('NombreBlocs') }}">  // Input field for block count
                                    @if ($errors->any('NombreBlocs'))  // Checks for validation errors
                                        <span class="text-danger">{{ $errors->first('NombreBlocs') }}</span>  // Displays the error message
                                    @endif
                                </div>

                                <button class="btn btn-primary" type="submit"> VALIDER</button>  // Submit button for the form
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  // Ends the content section

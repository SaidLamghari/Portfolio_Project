@extends('adminlte::page')  <!-- Extend the adminlte layout for consistent styling -->

@section('title', 'Ajouter Suite Extemporanée')  <!-- Set the page title -->

@section('content_header')  <!-- Section for the content header -->
@stop  <!-- End of content header section -->

@section('content')  <!-- Main content section -->
    <div class="container">  <!-- Container for the form -->
        <div class="row justify-content-center">  <!-- Center the content in the row -->
            <div class="col-md-12">  <!-- Use full-width column on medium devices -->
                <div class="card">  <!-- Card component for styling -->
                    <div class="card-header">  <!-- Header of the card -->
                        <div class="d-flex justify-content-between">  <!-- Flexbox for layout -->
                            <div> Ajouter Prelevement</div>  <!-- Title inside card header -->
                            <div class="pull-right">  <!-- Right-aligned button section -->
                                <!-- Button to go back to the index page -->
                                <a class="btn btn-success" href="{{ route('SE.index') }}">Retour </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">  <!-- Body of the card containing the form -->
                        <!-- Form to submit new Suite Extemporanée data -->
                        <form action="{{ route('SE.store') }}" method="POST" enctype="multipart/form-data">  
                            @csrf  <!-- CSRF token for security -->
                            
                            <div class="form-group">  <!-- Group for Numero d'Anapath input -->
                                <!-- Input for Numero d'Anapath -->
                                <label for="NumeroAnapath">Numero d'Anapath</label>  
                                <input type="numeric" name="NumeroAnapath" value="{{ old('NumeroAnapath') }}"
                                    class="form-control" id="NumeroAnapath" placeholder="N° Anapath">  <!-- Numeric input field -->
                                
                                @if ($errors->any('NumeroAnapath'))  <!-- Check for errors -->
                                    <span class="text-danger">{{ $errors->first('NumeroAnapath') }}</span>  <!-- Display error message -->
                                @endif
                            </div>

                            <div class="form-group ">  <!-- Group for Service dropdown -->
                                <!-- Dropdown for selecting Service -->
                                <label for="Service">Service</label>  
                                <select id="Service" class="form-control" name="Service">
                                    <option value="">Choose...</option>  <!-- Default option -->
                                    @if (count($services))  <!-- Check if services exist -->
                                        @foreach ($services as $service)  <!-- Loop through each service -->
                                            <option value="{{ $service->id }}" name="Service"
                                                {{ old('Service') && old('Service') == $service->id ? 'selected' : '' }}>  <!-- Set selected if previously selected -->
                                                {{ $service->Nom }}</option>  <!-- Display service name -->
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->any('Service'))  <!-- Check for errors -->
                                    <span class="text-danger">{{ $errors->first('Service') }}</span>  <!-- Display error message -->
                                @endif
                            </div>

                            <div class="form-group">  <!-- Group for Organe input -->
                                <!-- Input for Organe -->
                                <label for="organe">Organe</label>  
                                <input type="text" class="form-control" id="organe" placeholder="Organe"
                                    name="organe" value="{{ old('organe') }}">  <!-- Text input for organ name -->
                                @if ($errors->any('organe'))  <!-- Check for errors -->
                                    <span class="text-danger">{{ $errors->first('organe') }}</span>  <!-- Display error message -->
                                @endif
                            </div>

                            @php
                                // Get today's date for the date input
                                $today = date('Y-m-d');  // Store current date
                            @endphp

                            <div class="form-group pmd-textfield pmd-textfield-floating-label" data-provide="datepicker">  <!-- Group for date input -->
                                <!-- Date selection input -->
                                <label class="control-label" for="dater">Select Date</label>  
                                <input type="date" class="form-control" id="datepicker" name="date" value="{{ $today }}">  <!-- Date input with default value -->
                                <div class="input-group-addon">  <!-- Add-on for date input -->
                                    <span class="glyphicon glyphicon-th"></span>  <!-- Calendar icon -->
                                    @if ($errors->any('date'))  <!-- Check for errors -->
                                        <span class="text-danger">{{ $errors->first('date') }}</span>  <!-- Display error message -->
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">  <!-- Group for Description textarea -->
                                <!-- Textarea for Description -->
                                <label for="description">Description</label>  
                                <textarea type="text" class="form-control" id="description" placeholder="description" name="description" style="height:100px">{{ old('description') }}</textarea>  <!-- Textarea for description -->
                                @if ($errors->any('description'))  <!-- Check for errors -->
                                    <span class="text-danger">{{ $errors->first('description') }}</span>  <!-- Display error message -->
                                @endif
                            </div>

                            <div class="form-group">  <!-- Group for Nombre Blocs input -->
                                <!-- Input for Nombre Blocs -->
                                <label for="NombreBlocs">Nombre Blocs</label>  
                                <input type="text" class="form-control" id="NombreBlocs" placeholder="Nombre Blocs"
                                    name="NombreBlocs" value="{{ old('NombreBlocs') }}">  <!-- Input for number of blocs -->
                                @if ($errors->any('NombreBlocs'))  <!-- Check for errors -->
                                    <span class="text-danger">{{ $errors->first('NombreBlocs') }}</span>  <!-- Display error message -->
                                @endif
                            </div>

                            <!-- Submit button to validate the form -->
                            <button class="btn btn-primary" type="submit"> VALIDER</button>  
                        </form>  <!-- End of form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')  <!-- Section for JavaScript -->
    <script type="text/javascript">
        // Initialize the select2 plugin for the Service dropdown
        $("#Service").select2({  // Select the Service dropdown
            placeholder: "Selectionner un Service",  // Placeholder text
            allowClear: true  // Allow clearing the selection
        });
    </script>
@endsection

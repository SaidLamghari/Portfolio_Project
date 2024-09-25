<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Ajax Autocomplete Dynamic Search with select2</title>
    
    <!-- Include the Select2 CSS for styling the select input -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Include the Select2 JavaScript for functionality -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <style>
        /* Set a max width for the container */
        .container {
            max-width: 500px;
        }
        
        /* Style for the header */
        h2 {
            color: white; /* Change the text color to white */
        }
    </style>
</head>
<body class="bg-primary">
    <div class="container mt-5">
        <h2>Laravel AJAX Autocomplete Search with Select2</h2>
        
        <!-- Create a select element for the autocomplete search -->
        <select class="livesearch form-control" name="livesearch"></select>
    </div>
</body>
<script type="text/javascript">
    // Initialize Select2 on the .livesearch element
    $('.livesearch').select2({
        placeholder: 'Select movie', // Placeholder text for the select box
        ajax: {
            // URL to fetch data for autocomplete
            url: '/ajax-autocomplete-search',
            dataType: 'json', // Expect JSON response
            delay: 250, // Delay in ms before sending the request
            processResults: function (data) {
                // Map the response data to the format required by Select2
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name, // Display text in the dropdown
                            id: item.id // Value to be used internally
                        }
                    })
                };
            },
            cache: true // Cache the results for faster subsequent requests
        }
    });
</script>
</html>

@extends('adminlte::page')  {{-- Extends the adminlte layout for consistent styling and structure --}}
@section('title', 'Ajouter un compte')  {{-- Sets the title for the page --}}



@section('content')  {{-- Starts the content section of the page --}}
    <h2>Register</h2>  {{-- Displays the main heading for the registration form --}}
    
    <form method="POST" action="/register">  {{-- Opens a form that submits via POST to the /register route --}}
        {{ csrf_field() }}  {{-- Generates a CSRF token for form security --}}
        
        <div class="form-group">  {{-- Starts a form group for better styling --}}
            <label for="name">Full Name:</label>  {{-- Label for the name input field --}}
            <input type="text" class="form-control" id="name" name="name">  {{-- Input field for full name --}}
        </div>

        <div class="form-group">  {{-- Another form group for email input --}}
            <label for="email">Email:</label>  {{-- Label for the email input field --}}
            <input type="email" class="form-control" id="email" name="email">  {{-- Input field for email --}}
        </div>



        <div class="form-group">  {{-- Form group for password input --}}
            <label for="password">Password:</label>  {{-- Label for the password input field --}}
            <input type="password" class="form-control" id="password" name="password">  {{-- Input field for password --}}
        </div>

        <div class="form-group">  {{-- Form group for the submit button --}}
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>  {{-- Submit button for the form --}}
        </div>


        
        {{-- @include('partials.formerrors') --}}  {{-- Uncomment to include partials for displaying form errors --}}
    </form>

@endsection  {{-- Ends the content section --}}

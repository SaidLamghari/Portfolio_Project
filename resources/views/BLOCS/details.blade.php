@extends('adminlte::page')

@section('title', 'F'.$prelevements ->NumeroAnapath )

@section('content_header')

@section('content')
@section('content')
 
 <h3>{{$prelevements ->Type}} </h3>
 <br>


<div>
    @if($prelevements ->Type=='Reprelevement')
    <h2><strong>EXAMEN N°:  R {{$prelevements ->NumeroAnapath}}</strong></h2>
    @elseif($prelevements ->Type=='Extemporanee')
   <h2><strong>EXAMEN N°:  E {{$prelevements ->NumeroAnapath}}</strong></h2>
   @elseif($prelevements ->Type=='Suite Extemporanée')
   <h2><strong>EXAMEN N°:  S{{$prelevements ->NumeroAnapath}}</strong></h2>
   @else
   <h2><strong>EXAMEN N°:  F {{$prelevements ->NumeroAnapath}}</strong></h2>
 @endif
    {{-- @endforeach --}}
</div>
<br>
 @php
        $today = date('d-m-Y');
@endphp 

@if (Auth::user()->role == 'Medecin')
<pre id="idf2"><h4>Examen macroscopique réalisé par : Dr.{{auth()->user()->name}}        Date:{{$today}}</h4></pre>
 @else
<pre id="idf2"><h4>Mise en cours réalisée par : {{auth()->user()->name}}        Date:{{$today}}</h4></pre>
@endif
@if (Auth::user()->role == 'Medecin')
<div id="idf">
<span class="text-center"> <h4>FICHE DE MACROSCOPIE </h4></span>
</div>
@endif
<br>
<div id="idf2">

  {{ $prelevements->Description }}
</div>

<style>
    #idf{
        border-width:1px;  
    border-style:solid;
    }
    #idf2{
        text-align:justify;
        height:auto;
        width: auto;
        border-width:0px;  
        border-style:groove;
   


    }
</style>


    

 





    <div class="container mt-5">
        {{-- <div class="pull-right">
            <a class="btn btn-success" href="{{ URL::previous() }}">Retour </a>
        </div> --}}

    <style>
        #eye {
            color: blueviolet;
        }

        #edit {
            color: darkorange;
        }

        #trash {
            color: red;
        }
    </style>
    <table class="table table-striped table-hover table-bordered">
        <thead>
        @if (Auth::user()->role == 'Medecin')
            <tr>
     
                {{-- <th>NO</th> --}}
                <th>Reference Bloc </th>
                <th>Siege du Prélèvement</th>
                <th>F</th>
                <th>C</th>
                <th>R</th>
                <th>Decals</th>
                <th class="hide-from-printer" >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blocs as $bloc)
                <tr>
                    {{-- <th>{{ $bloc->id }}</th> --}}
                    <th>{{ $bloc->Reference_Bloc }}</th>
                    <th>{{ $bloc->Siege }}</th>
                    <th>{{ $bloc->Cassettes }}</th>
                    <th>{{ $bloc->Fragments }}</th>
                    <th>{{ $bloc->Reste }}</th>
                    <th>{{ $bloc->Decals }}</th>
                    <th  class="hide-from-printer" >

                        <a href="{{ route('Blocs.show', $bloc->id) }}" class="text-primary" title="View"
                            data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                        <a href="{{ route('Blocs.edit', $bloc->id) }}" class="text-success" title="Edit"
                            data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('Blocs.destroy', $bloc->id) }}" class="delete" title="Delete"
                            data-toggle="tooltip"><i id="trash" class="fa fa-trash"></i></a>

                    </th>
                </tr>
            @endforeach
        </tbody>
        <tfoot>


    </table>
   
    @elseif (Auth::user()->role == 'Technicien')
    <tr>
     
        <th>#</th>
        <th>Reference Bloc </th>
        <th>Nombre Fragments</th>
        <th>Decals</th>
        <th class="hide-from-printer">Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($blocs as $bloc)
        <tr>
            <th>{{ $bloc->id }}</th>
            <th>{{ $bloc->Reference_Bloc }}</th>
            <th>{{ $bloc->Fragments }}</th>
            <th>{{ $bloc->Decals }}</th>
            <th class="hide-from-printer">

                <a href="{{ route('Blocs.show', $bloc->id) }}" class="text-primary" title="View"
                    data-toggle="tooltip"><i class="fa fa-eye"></i></a>

                <a href="{{ route('Blocs.edit', $bloc->id) }}" class="text-success" title="Edit"
                    data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                <a href="{{ route('Blocs.destroy', $bloc->id) }}" class="delete" title="Delete"
                    data-toggle="tooltip"><i id="trash" class="fa fa-trash"></i></a>

            </th>
        </tr>
    @endforeach
   
    
    


    

</tbody>


<tfoot>

    @endif



</table>




</div>
<div class="text-center" >
                         
    <button onclick="window.print()" class="hide-from-printer"  name="print">IMPRIMER</button>
    <style>
        @media print {
/* style sheet for print goes here */
.hide-from-printer{  display:none; }
                }
</style>
   

</div>

 
@endsection

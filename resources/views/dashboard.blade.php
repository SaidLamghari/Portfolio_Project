@extends('adminlte::page') {{-- Étend le modèle de page AdminLTE --}}

@section('title', 'Accueil') {{-- Définit le titre de la page --}}

@section('content_header') {{-- Section pour l'en-tête du contenu --}}
    <h1>Accueil</h1> {{-- Titre de la page affiché dans l'en-tête --}}
@stop

@section('content') {{-- Section principale du contenu --}}
    {{-- <div class="container"> --}} {{-- Commenté : conteneur principal, peut être utilisé pour des styles supplémentaires --}}
    <div class="row justify-content-center"> {{-- Création d'une rangée centrée --}}
        <div class="col-md-8"> {{-- Colonne de taille 8 sur un écran de taille moyenne --}}
            <div class="card"> {{-- Début d'une carte pour afficher le contenu --}}
                <div class="card-header">{{ __('Dashboard') }}</div> {{-- En-tête de la carte, titre "Dashboard" --}}

                <div class="card-body"> {{-- Corps de la carte où le contenu principal est affiché --}}
                    @if (session('status')) {{-- Vérifie si une session 'status' existe --}}
                        <div class="alert alert-success" role="alert"> {{-- Affiche une alerte de succès --}}
                            {{ session('status') }} {{-- Affiche le message de session --}}
                        </div>
                    @endif
                    @if (Auth::user()->role == 'Medecin') {{-- Vérifie si le rôle de l'utilisateur est 'Medecin' --}}
                        <p style="font-size:22px"> IT'S A BEAUTIFULL DAY TO SAVE LIVES <span style="color:blue"> Dr. {{auth()->user()->name}} !</span></p> {{-- Message personnalisé pour les médecins --}}
                    @else {{-- Si le rôle n'est pas 'Medecin' --}}
                        <p style="font-size:22px"> IT'S A BEAUTIFULL DAY TO SAVE LIVES <span style="color:blue"> {{auth()->user()->name}} !</span></p> {{-- Message générique avec le nom de l'utilisateur --}}
                    @endif
                </div> {{-- Fin du corps de la carte --}}
            </div> {{-- Fin de la carte --}}
        </div> {{-- Fin de la colonne --}}
    </div> {{-- Fin de la rangée --}}
    {{-- </div> --}} {{-- Commenté : fin du conteneur principal --}}
@endsection {{-- Fin de la section de contenu --}}

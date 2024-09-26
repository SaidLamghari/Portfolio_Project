@extends('adminlte::page') {{-- Étend le modèle de page AdminLTE pour utiliser ses styles et sa structure --}}




@section('title', 'Edit Piece Operatoire') {{-- Définit le titre de la page --}}

@section('content_header') {{-- Section pour l'en-tête du contenu --}}
    <h1>Détail prelevement</h1> {{-- Titre principal de la section d'en-tête --}}
@stop {{-- Fin de la section d'en-tête --}}



@section('content') {{-- Section principale du contenu --}}
    <div class="container mt-5"> {{-- Conteneur principal avec une marge supérieure --}}
        <a class="btn btn-success" href="{{ route('PO.index') }}">Retour </a> {{-- Bouton de retour vers l'index des prélèvements --}}
        <form action="{{ route('Prelevements.update', $prelevement->id) }}" method="POST"> {{-- Formulaire pour mettre à jour le prélèvement --}}
            {{ csrf_field() }} {{-- Génère un token CSRF pour la sécurité --}}
            @method('PUT') {{-- Indique que la méthode HTTP utilisée est PUT pour la mise à jour --}}
            
            <div class="row mb-3"> {{-- Début d'une rangée pour le numéro Anapath --}}
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Numero Anapath</label> {{-- Étiquette pour le champ numéro Anapath --}}
                <div class="col-sm-10"> {{-- Colonne pour le champ de saisie --}}
                    <input name="NumeroAnapath" type="text" class="form-control" id="numeroAnapath" {{-- Champ de saisie pour le numéro Anapath --}}
                        value="{{ $prelevement->NumeroAnapath }}" disabled> {{-- Valeur préremplie à partir de l'objet $prelevement, champ désactivé --}}
                    @if ($errors->any('NumeroAnapath')) {{-- Vérifie s'il y a des erreurs pour ce champ --}}
                        <span class="text-danger">{{ $errors->first('NumeroAnapath') }}</span> {{-- Affiche le message d'erreur --}}
                    @endif
                </div>
            </div>

            <div class="row mb-3"> {{-- Début d'une rangée pour la description --}}
                <label for="description" class="col-sm-2 col-form-label">Description</label> {{-- Étiquette pour le champ description --}}
                <div class="col-sm-10"> {{-- Colonne pour le champ de saisie --}}
                    <textarea style="height:200px" name="Description" class="form-control" id="description">{{ $prelevement->Description }}</textarea> {{-- Champ de texte pour la description, prérempli --}}
                    @if ($errors->any('Description')) {{-- Vérifie s'il y a des erreurs pour ce champ --}}
                        <span class="text-danger">{{ $errors->first('Description') }}</span> {{-- Affiche le message d'erreur --}}
                    @endif
                </div>
            </div>


            
            <div class="row mb-3"> {{-- Début d'une rangée pour le tableau des blocs --}}
                <table class="table table-striped"> {{-- Table pour afficher les détails des blocs --}}
                    <thead> {{-- En-tête de la table --}}
                        <tr>
                            <th>Reference bloc</th> {{-- Colonne pour la référence du bloc --}}
                            <th>Siege</th> {{-- Colonne pour le siège --}}
                            <th>Nombre Cassettes</th> {{-- Colonne pour le nombre de cassettes --}}
                            <th>Nombre Fragments</th> {{-- Colonne pour le nombre de fragments --}}
                            <th>Reste</th> {{-- Colonne pour le reste --}}
                            <th>Decals</th> {{-- Colonne pour les decals --}}
                        </tr>
                    </thead>
                    <tbody> {{-- Corps de la table --}}
                        @foreach ($prelevement->blocs as $bloc) {{-- Boucle à travers chaque bloc associé au prélèvement --}}
                            <tr>
                                <td>{{ $bloc->Reference_Bloc }}</td> {{-- Affiche la référence du bloc --}}
                                <td>{{ $bloc->Siege }}</td> {{-- Affiche le siège --}}
                                <td>{{ $bloc->Cassettes }}</td> {{-- Affiche le nombre de cassettes --}}
                                <td>{{ $bloc->Fragments }}</td> {{-- Affiche le nombre de fragments --}}
                                <td>{{ $bloc->Reste }}</td> {{-- Affiche le reste --}}
                                <td>{{ $bloc->Decals }}</td> {{-- Affiche les decals --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table> {{-- Fin de la table --}}
            </div>
            
            <button class="btn btn-primary" type="submit" method="post"> Modifier </button> {{-- Bouton pour soumettre le formulaire de mise à jour --}}
        </form> {{-- Fin du formulaire --}}
    </div> {{-- Fin du conteneur principal --}}
@endsection {{-- Fin de la section de contenu --}}

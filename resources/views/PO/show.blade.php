@extends('adminlte::page') {{-- Étend le modèle de page AdminLTE --}}

@section('title', 'Detail Piece Operatoire') {{-- Définit le titre de la page --}}



@section('content_header') {{-- Section pour l'en-tête du contenu --}}
    <h1>Détail prelevement</h1> {{-- Titre principal affiché sur la page --}}


    @stop {{-- Fin de la section d'en-tête --}}

@section('content') {{-- Section principale du contenu --}}
    <div class="container mt-5"> {{-- Conteneur principal avec un margin-top de 5 --}}
        <div class="pull-right"> {{-- Alignement à droite pour le bouton de retour --}}
            <a class="btn btn-success" href="{{ route('PO.index') }}">Retour </a> {{-- Lien pour retourner à la liste des pièces opératoires --}}
        </div>
        <form action="" method="post"> {{-- Formulaire (action vide car on ne soumet rien ici) --}}
            <div class="row mb-3"> {{-- Rangée pour le numéro Anapath --}}
                <label for="numeroAnapath" class="col-sm-2 col-form-label">Numero Anapath</label> {{-- Étiquette pour le champ --}}
                <div class="col-sm-10"> {{-- Colonne pour le champ de saisie --}}
                    <input type="text" class="form-control" id="numeroAnapath" {{-- Champ de saisie pour le numéro Anapath --}}
                        value="{{ $prelevement->NumeroAnapath }}" disabled> {{-- Valeur du champ désactivée --}}
                </div>
            </div>
            <div class="row mb-3"> {{-- Rangée pour l'organe --}}
                <label for="organe" class="col-sm-2 col-form-label">Organe</label> {{-- Étiquette pour l'organe --}}
                <div class="col-sm-10"> {{-- Colonne pour le champ de saisie --}}
                    <input type="text" class="form-control" id="organe" value="{{ $prelevement->Organe }}" disabled> {{-- Champ désactivé pour afficher l'organe --}}
                </div>
            </div>
            <div class="row mb-3"> {{-- Rangée pour la description --}}
                <label for="description" class="col-sm-2 col-form-label">Description</label> {{-- Étiquette pour la description --}}
                <div class="col-sm-10"> {{-- Colonne pour le champ de texte --}}
                    <textarea style="height:200px" class="form-control" id="description" disabled>{{ $prelevement->Description }}</textarea> {{-- Champ de texte désactivé pour afficher la description --}}
                </div>
            </div>
            <div class="row mb-3"> {{-- Rangée pour le tableau des blocs --}}
                <table class="table table-striped"> {{-- Table avec un style rayé --}}
                    <thead> {{-- En-tête du tableau --}}
                        <tr>
                            <th>reference_bloc</th> {{-- Colonne pour la référence du bloc --}}
                            <th>nbr_cassettes</th> {{-- Colonne pour le nombre de cassettes --}}
                            <th>nbr_frag</th> {{-- Colonne pour le nombre de fragments --}}
                            <th>siege</th> {{-- Colonne pour le siège --}}
                            <th>Decals</th> {{-- Colonne pour les décals --}}
                        </tr>
                    </thead>
                    <tbody> {{-- Corps du tableau --}}
                        @foreach ($prelevement->blocs as $bloc) {{-- Boucle à travers chaque bloc associé au prélèvement --}}
                            <tr>
                                <td>{{ $bloc->Reference_Bloc }}</td> {{-- Affiche la référence du bloc --}}
                                <td>{{ $bloc->Cassettes }}</td> {{-- Affiche le nombre de cassettes --}}
                                <td>{{ $bloc->Fragments }}</td> {{-- Affiche le nombre de fragments --}}
                                <td>{{ $bloc->Siege }}</td> {{-- Affiche le siège --}}
                                <td>{{ $bloc->Decals }}</td> {{-- Affiche les décals --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table> {{-- Fin de la table --}}
            </div>
        </form> {{-- Fin du formulaire --}}
    </div>

@endsection {{-- Fin de la section de contenu --}}

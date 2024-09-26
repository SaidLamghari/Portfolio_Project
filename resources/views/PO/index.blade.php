@extends('adminlte::page') {{-- Étend le modèle de page AdminLTE --}}

@section('title', 'Pieces Operatoires') {{-- Définit le titre de la page --}}

@section('content_header') {{-- Section pour l'en-tête du contenu --}}
@stop {{-- Fin de la section d'en-tête --}}

@section('content') {{-- Section principale du contenu --}}
    <style> {{-- Style CSS pour la page --}}
        .search-box { {{-- Style pour la boîte de recherche --}}
            position: relative; {{-- Position relative pour permettre le placement d'éléments enfants --}}
            display: flex; {{-- Utilise flexbox pour aligner les éléments en ligne --}}
        }
        .search-box input { {{-- Style pour le champ de saisie de recherche --}}
            height: 34px; {{-- Hauteur du champ --}}
            border-radius: 20px; {{-- Arrondi des bords --}}
            padding-left: 35px; {{-- Espace à gauche pour l'icône de recherche --}}
            border-color: #ddd; {{-- Couleur de la bordure par défaut --}}
            box-shadow: none; {{-- Pas d'ombre par défaut --}}
            margin-right: 10px; {{-- Espace à droite du champ --}}
        }
        .search-box input:focus { {{-- Style pour le champ lorsque le focus est actif --}}
            border-color: #3FBAE4; {{-- Change la couleur de la bordure au focus --}}
        }
        .search-box i { {{-- Style pour l'icône de recherche --}}
            color: #a0a5b1; {{-- Couleur de l'icône --}}
            position: absolute; {{-- Position absolue pour placer l'icône à l'intérieur du champ --}}
            font-size: 19px; {{-- Taille de l'icône --}}
            top: 8px; {{-- Position verticale de l'icône --}}
            left: 10px; {{-- Position horizontale de l'icône --}}
        }
        #eye { color: blueviolet; } {{-- Couleur pour l'icône d'œil --}}
        #edit { color: darkorange; } {{-- Couleur pour l'icône d'édition --}}
        #trash { color: red; } {{-- Couleur pour l'icône de suppression --}}
    </style>
    
    <div class="container"> {{-- Conteneur principal --}}
        @if ($message = Session::get('success')) {{-- Vérifie si un message de succès est présent --}}
            <div class="alert alert-success"> {{-- Affiche une alerte de succès --}}
                <p>{{ $message }}</p> {{-- Affiche le message --}}
            </div>
        @elseif ($message = Session::get('deleted')) {{-- Vérifie si un message de suppression est présent --}}
            <div class="alert alert-danger"> {{-- Affiche une alerte d'erreur --}}
                <p>{{ $message }}</p> {{-- Affiche le message --}}
            </div>
        @endif
        

        
        <div class="row justify-content-center"> {{-- Rangée centrée pour le contenu --}}
            <div class="col-md-12"> {{-- Colonne principale --}}
                <div class="card"> {{-- Carte pour contenir les éléments --}}
                    <div class="card-header"> {{-- En-tête de la carte --}}
                        <div class="d-flex justify-content-between"> {{-- Utilise flexbox pour aligner les éléments --}}
                            <div> </div> {{-- Éléments supplémentaires peuvent être ajoutés ici --}}
                            @if (Auth::user()->role == 'Medecin') {{-- Vérifie si l'utilisateur est médecin --}}
                                <div class="pull-right"> {{-- Aligne à droite --}}
                                    <a class="btn btn-success" href="{{ route('PO.create') }}"> Ajouter Prelevement</a> {{-- Lien pour ajouter un prélèvement --}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body"> {{-- Corps de la carte --}}
                        <div class="table-title"> {{-- Titre de la table --}}
                            <div class="row"> {{-- Rangée pour le titre et la recherche --}}
                                <div class="col-sm-6"> {{-- Colonne pour le titre --}}
                                    <h5>Demandes du Jour/<a href="{{ route('PO.index') }}">Piece Operatoires</a></h5> {{-- Titre avec lien vers les pièces opératoires --}}
                                </div>
                                <div class="col-sm-6"> {{-- Colonne pour le formulaire de recherche --}}
                                    <form class="search-box" method="GET" action="{{ route('PO.search') }}"> {{-- Formulaire de recherche --}}
                                        <i class="fa fa-search"></i> {{-- Icône de recherche --}}
                                        <input type="text" class="form-control" name="query" placeholder="Search&hellip;"> {{-- Champ de saisie pour la recherche --}}
                                        <button class="btn btn-primary" type="submit">Search</button> {{-- Bouton de soumission pour la recherche --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered"> {{-- Table pour afficher les prélèvements --}}
                            <thead> {{-- En-tête de la table --}}
                                <tr>
                                    <th class="text-center">#</th> {{-- Colonne pour l'ID --}}
                                    <th class="text-center">N°Anapath</th> {{-- Colonne pour le numéro Anapath --}}
                                    {{-- <th class="text-center">Organe</th> --}} {{-- Colonne commentée pour l'organe --}}
                                    {{-- <th class="text-center">Service</th> --}} {{-- Colonne commentée pour le service --}}
                                    <th class="text-center">Medecin Manipulateur</th> {{-- Colonne pour le médecin manipulateur --}}
                                    <th class="text-center">Date Manipulation</th> {{-- Colonne pour la date de manipulation --}}
                                    <th class="text-center">Nombre Blocs</th> {{-- Colonne pour le nombre de blocs --}}
                                    @if (Auth::user()->role == 'Medecin') {{-- Vérifie si l'utilisateur est médecin --}}
                                        <th>Action</th> {{-- Colonne pour les actions (édition, suppression) --}}
                                    @endif
                                </tr>
                            </thead>
                            <tbody> {{-- Corps de la table --}}
                                @foreach ($prelevements as $pre) {{-- Boucle à travers chaque prélèvement --}}
                                    <tr>
                                        <td class="text-center">{{ $pre->id }}</td> {{-- Affiche l'ID du prélèvement --}}
                                        <td class="text-center">{{ $pre->NumeroAnapath }}</td> {{-- Affiche le numéro Anapath --}}
                                        {{-- <td class="text-center">{{ $pre->Organe }}</td> --}} {{-- Colonne commentée pour l'organe --}}
                                        {{-- <td class="text-center"> {{ $pre->service->Nom ?? ' Nom de service not found' }} </td> --}} {{-- Colonne commentée pour le service --}}
                                        <td class="text-center">Dr.{{ $pre->user->name }}</td> {{-- Affiche le nom du médecin --}}
                                        <td class="text-center">{{ $pre->DateManipulation }}</td> {{-- Affiche la date de manipulation --}}
                                        <td class="text-center">{{ $pre->NombreBlocs }}</td> {{-- Affiche le nombre de blocs --}}
                                        @if (Auth::user()->role == 'Medecin') {{-- Vérifie si l'utilisateur est médecin --}}
                                            <td> {{-- Colonne pour les actions --}}
                                                <a href="{{ route('Blocs.details', $pre->id) }}" class="text-primary" title="View" data-toggle="tooltip"><i id="eye" class="fa fa-eye"></i></a> {{-- Lien pour voir les détails --}}
                                                <a href="{{ route('Prelevements.edit', $pre->id) }}" class="text-success" title="Edit" data-toggle="tooltip"><i id="edit" class="fa fa-edit"></i></a> {{-- Lien pour éditer le prélèvement --}}
                                                <a href="{{ route('Prelevements.destroy', $pre->id) }}" class="delete" title="Delete" data-toggle="tooltip"><i id="trash" class="fa fa-trash"></i></a> {{-- Lien pour supprimer le prélèvement --}}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> {{-- Fin de la table --}}
                    </div>
                    <div class="card-footer"> {{-- Pied de carte pour la pagination --}}
                        {{ $prelevements->links() }} {{-- Liens de pagination --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection {{-- Fin de la section de contenu --}}

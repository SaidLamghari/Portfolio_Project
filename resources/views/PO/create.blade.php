@extends('adminlte::page') {{-- Étend le modèle de page AdminLTE pour utiliser ses styles et sa structure --}}

@section('title', 'Ajouter Piece Operatoire') {{-- Définit le titre de la page --}}

@section('content_header') {{-- Section pour l'en-tête du contenu --}}

@stop {{-- Fin de la section d'en-tête --}}

@section('content') {{-- Section principale du contenu --}}
    <div class="container"> {{-- Conteneur principal pour le contenu --}}
        <div class="row justify-content-center"> {{-- Crée une rangée centrée --}}
            <div class="col-md-12"> {{-- Colonne de taille 12 pour un affichage large --}}
                <div class="card"> {{-- Début d'une carte pour afficher le contenu --}}
                    <div class="card-header"> {{-- En-tête de la carte --}}
                        <div class="d-flex justify-content-between"> {{-- Utilise Flexbox pour espacer le contenu --}}
                            <div> Ajouter Prelevements</div> {{-- Titre de la section --}}
                            <div class="pull-right"> {{-- Alignement à droite pour le bouton --}}
                                <a class="btn btn-success" href="{{ route('PO.index') }}">Retour </a> {{-- Bouton de retour vers l'index des prélèvements --}}
                            </div>
                        </div>
                        
                        @php
                        $year = substr(date('y'), -2); {{-- Récupère les deux derniers chiffres de l'année actuelle --}}
                        @endphp

                        <div class="card-body"> {{-- Corps de la carte où le contenu principal est affiché --}}
                            <form action="{{ route('Prelevements.store') }}" method="POST" enctype="multipart/form-data"> {{-- Formulaire d'ajout de prélèvements --}}
                                @csrf {{-- Génère un token CSRF pour la sécurité --}}
                                <div class="form-group"> {{-- Début d'un groupe de formulaire --}}
                                    <label for="NumeroAnapath"> {{-- Étiquette pour le champ de numéro Anapath --}}
                                     Numero Anapath
                                    </label>
                            
                                    <input type="numeric" name="NumeroAnapath" {{-- Champ de saisie pour le numéro Anapath --}}
                                        class="form-control" id="NumeroAnapath" placeholder="N° Anapath"
                                          value=@php
                                        echo  $year.(idate('m')); {{-- Définit la valeur par défaut avec l'année et le mois --}}
                                    @endphp> 
                                       
                                    @if ($errors->any('NumeroAnapath')) {{-- Vérifie s'il y a des erreurs pour ce champ --}}
                                        <span class="text-danger">{{ $errors->first('NumeroAnapath') }}</span> {{-- Affiche le premier message d'erreur --}}
                                    @endif
                                </div>

                                {{-- Commenté : section pour sélectionner un service --}}
                                {{-- <div class="form-group ">
                                    <label for="Service">Service</label>
                                    <select id="Service" class="form-control" name="Service">
                                        <option value="">Choose...</option>
                                        @if (count($services))
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}" name="Service"
                                                    {{ old('Service') && old('Service') == $service->id ? 'selected' : '' }}>
                                                    {{ $service->Nom }}</option> {{-- Affiche les services disponibles --}}
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->any('Service')) {{-- Vérifie s'il y a des erreurs pour le service --}}
                                        <span class="text-danger">{{ $errors->first('Service') }}</span> {{-- Affiche le message d'erreur --}}
                                    @endif
                                </div> --}}

                                {{-- Commenté : section pour l'organe --}}
                                {{-- <div class="form-group">
                                    <label for="organe">Organe</label>
                                    <input type="text" class="form-control" id="organe" placeholder="Organe"
                                        name="organe" value="{{ old('organe') }}">
                                    @if ($errors->any('organe')) {{-- Vérifie s'il y a des erreurs pour l'organe --}}
                                        <span class="text-danger">{{ $errors->first('organe') }}</span> {{-- Affiche le message d'erreur --}}
                                    @endif
                                </div> --}}

                                @php
                                    $today = date('Y-m-d'); {{-- Définit la date d'aujourd'hui au format Y-m-d --}}
                                @endphp

                                <div class="form-group pmd-textfield pmd-textfield-floating-label" {{-- Groupe pour le champ de date --}}
                                    data-provide="datepicker"> {{-- Indique que c'est un champ de date --}}
                                    <label class="control-label" for="dater">Select Date</label> {{-- Étiquette pour le champ de date --}}
                                    <input type="date" class="form-control" id="datepicker" name="date" {{-- Champ de saisie pour la date --}}
                                        value=@php
                                            echo $today; {{-- Définit la valeur par défaut à la date d'aujourd'hui --}}
                                        @endphp>
                                    <div class="input-group-addon"> {{-- Zone pour les icônes ou le texte d'aide --}}
                                        <span class="glyphicon glyphicon-th"></span>
                                        @if ($errors->any('date')) {{-- Vérifie s'il y a des erreurs pour la date --}}
                                            <span class="text-danger">{{ $errors->first('date') }}</span> {{-- Affiche le message d'erreur --}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group"> {{-- Début d'un groupe pour la description --}}
                                    <label for="description">Description</label> {{-- Étiquette pour le champ de description --}}
                                    <textarea type="text" class="form-control" id="description" placeholder="description" name="description" {{-- Champ de texte pour la description --}}
                                        value="{{ old('description') }}" style="height:100px"></textarea>
                                    @if ($errors->any('description')) {{-- Vérifie s'il y a des erreurs pour la description --}}
                                        <span class="text-danger">{{ $errors->first('description') }}</span> {{-- Affiche le message d'erreur --}}
                                    @endif
                                </div>

                                <div class="form-group"> {{-- Début d'un groupe pour le nombre de blocs --}}
                                    <label for="NombreBlocs">Nombre Blocs</label> {{-- Étiquette pour le champ du nombre de blocs --}}
                                    <input type="text" class="form-control" id="NombreBlocs" placeholder="Nombre Blocs"
                                        name="NombreBlocs" value="{{ old('NombreBlocs') }}"> {{-- Champ de saisie pour le nombre de blocs --}}
                                    @if ($errors->any('NombreBlocs')) {{-- Vérifie s'il y a des erreurs pour le nombre de blocs --}}
                                        <span class="text-danger">{{ $errors->first('NombreBlocs') }}</span> {{-- Affiche le message d'erreur --}}
                                    @endif
                                </div>

                                <button class="btn btn-primary" type="submit" method="post"> VALIDER</button> {{-- Bouton pour soumettre le formulaire --}}
                            </form> {{-- Fin du formulaire --}}
                        </div> {{-- Fin du corps de la carte --}}
                    </div> {{-- Fin de la carte --}}
                </div> {{-- Fin de la colonne --}}
            </div> {{-- Fin de la rangée --}}
        </div> {{-- Fin du conteneur principal --}}
@endsection {{-- Fin de la section de contenu --}}

{{-- Commenté : section JavaScript pour la sélection du service, si nécessaire --}}
{{-- @section('javascript')
    <script type="text/javascript">
        $("#Service").select2({
            placeholder: "Selectionner un Service",
            allowClear: true
        });
    </script>
@endsection --}}

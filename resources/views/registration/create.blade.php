@extends('adminlte::auth.auth-page', ['auth_type' => 'register']) {{-- Étend le modèle de page d'authentification pour le registre --}}

@php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login')) {{-- Définit l'URL de connexion --}}
@php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register')) {{-- Définit l'URL d'enregistrement --}}







@if (config('adminlte.use_route_url', false)) {{-- Vérifie si les routes doivent être utilisées --}}
    @php($login_url = $login_url ? route($login_url) : '') {{-- Construit l'URL de connexion si elle existe --}}
    @php($register_url = $register_url ? route($register_url) : '') {{-- Construit l'URL d'enregistrement si elle existe --}}
@else
    @php($login_url = $login_url ? url($login_url) : '') {{-- Utilise l'URL complète pour la connexion --}}
    @php($register_url = $register_url ? url($register_url) : '') {{-- Utilise l'URL complète pour l'enregistrement --}}
@endif





@section('auth_header', __('adminlte::adminlte.register_message')) {{-- Définit le message d'en-tête pour l'enregistrement --}}

@section('auth_body') {{-- Section principale du corps d'authentification --}}
    <form action="/register1" method="post"> {{-- Formulaire pour l'enregistrement avec méthode POST --}}
        @csrf {{-- Génère un token CSRF pour la sécurité --}}

        {{-- Champ pour le nom --}}
        <div class="input-group mb-3"> {{-- Groupe d'entrée avec une marge inférieure --}}
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" {{-- Champ de saisie pour le nom --}}
                value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus> {{-- Valeur précédente si disponible --}}

            <div class="input-group-append"> {{-- Zone pour ajouter un élément à la fin du groupe d'entrée --}}
                <div class="input-group-text"> {{-- Zone de texte pour l'icône --}}
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span> {{-- Icône d'utilisateur --}}
                </div>
            </div>

            @error('name') {{-- Vérifie les erreurs pour le champ nom --}}
                <span class="invalid-feedback" role="alert"> {{-- Affiche le message d'erreur --}}
                    <strong>{{ $message }}</strong> {{-- Message d'erreur --}}
                </span>
            @enderror
        </div>

        {{-- Champ pour le rôle --}}
        <div class="input-group mb-3"> {{-- Groupe d'entrée pour le rôle --}}
            <select name="role" id="role" class="form-control @error('email') is-invalid @enderror"> {{-- Sélecteur pour le rôle --}}
                <option value="Medecin">Medecin</option> {{-- Option pour Médecin --}}
                <option value="Technicien">Technicien</option> {{-- Option pour Technicien --}}
            </select>

            @error('role') {{-- Vérifie les erreurs pour le champ rôle --}}
                <span class="invalid-feedback" role="alert"> {{-- Affiche le message d'erreur --}}
                    <strong>{{ $message }}</strong> {{-- Message d'erreur --}}
                </span>
            @enderror
        </div>

        {{-- Champ pour l'email --}}
        <div class="input-group mb-3"> {{-- Groupe d'entrée pour l'email --}}
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" {{-- Champ de saisie pour l'email --}}
            value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}"> {{-- Valeur précédente si disponible --}}

            <div class="input-group-append"> {{-- Zone pour ajouter un élément à la fin du groupe d'entrée --}}
                <div class="input-group-text"> {{-- Zone de texte pour l'icône --}}
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span> {{-- Icône d'email --}}
                </div>
            </div>

            @error('email') {{-- Vérifie les erreurs pour le champ email --}}
                <span class="invalid-feedback" role="alert"> {{-- Affiche le message d'erreur --}}
                    <strong>{{ $message }}</strong> {{-- Message d'erreur --}}
                </span>
            @enderror
        </div>

        {{-- Champ pour le mot de passe --}}
        <div class="input-group mb-3"> {{-- Groupe d'entrée pour le mot de passe --}}
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" {{-- Champ de saisie pour le mot de passe --}}
                placeholder="{{ __('adminlte::adminlte.password') }}"> {{-- Placeholder pour le mot de passe --}}

            <div class="input-group-append"> {{-- Zone pour ajouter un élément à la fin du groupe d'entrée --}}
                <div class="input-group-text"> {{-- Zone de texte pour l'icône --}}
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span> {{-- Icône de cadenas --}}
                </div>
            </div>

            @error('password') {{-- Vérifie les erreurs pour le champ mot de passe --}}
                <span class="invalid-feedback" role="alert"> {{-- Affiche le message d'erreur --}}
                    <strong>{{ $message }}</strong> {{-- Message d'erreur --}}
                </span>
            @enderror
        </div>

        {{-- Champ pour la confirmation du mot de passe --}}
        <div class="input-group mb-3"> {{-- Groupe d'entrée pour la confirmation du mot de passe --}}
            <input type="password" name="password_confirmation" {{-- Champ de saisie pour confirmer le mot de passe --}}
                class="form-control @error('password_confirmation') is-invalid @enderror" {{-- Vérifie les erreurs --}}
                placeholder="{{ __('adminlte::adminlte.retype_password') }}"> {{-- Placeholder pour confirmation --}}

            <div class="input-group-append"> {{-- Zone pour ajouter un élément à la fin du groupe d'entrée --}}
                <div class="input-group-text"> {{-- Zone de texte pour l'icône --}}
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span> {{-- Icône de cadenas --}}
                </div>
            </div>

            @error('password_confirmation') {{-- Vérifie les erreurs pour le champ de confirmation --}}
                <span class="invalid-feedback" role="alert"> {{-- Affiche le message d'erreur --}}
                    <strong>{{ $message }}</strong> {{-- Message d'erreur --}}
                </span>
            @enderror
        </div>

        {{-- Bouton d'enregistrement --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}"> {{-- Bouton de soumission --}}
            <span class="fas fa-user-plus"></span> {{-- Icône d'ajout d'utilisateur --}}
            {{ __('adminlte::adminlte.register') }} {{-- Texte du bouton d'enregistrement --}}
        </button>

    </form>
@stop

@section('auth_footer') {{-- Section pour le pied de page d'authentification --}}
    {{-- <p class="my-0"> --}} {{-- Commenté : possibilité d'ajouter un lien vers la connexion --}}
        {{-- <a href="{{ $login_url }}"> --}}
            {{-- {{ __('adminlte::adminlte.i_already_have_a_membership') }} --}}
        {{-- </a> --}}
    {{-- </p> --}}
@stop

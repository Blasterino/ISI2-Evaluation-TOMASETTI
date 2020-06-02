@extends('template')

@section('titrePage')
    Détails d'un film
@endsection

@section('titreItem')
    <h1>Titre : {{$monFilm->getTitre()}}</h1>
@endsection

@section('contenu')
    Année de sortie : {{$monFilm->getAnneeSortie()}}
    <br>
    Catégorie : {{$monFilm->getCategorie()->getLibelleCategorie()}}
    <hr>

    {{$monFilm->getDescription()}}
@endsection


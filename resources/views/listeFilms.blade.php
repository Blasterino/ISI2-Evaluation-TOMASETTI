@extends('template')

@section('titrePage')
    Liste des Films
@endsection

@section('titreItem')
    @if(empty($idCat))
        <h1>Tous les films :</h1>
    @else
        @foreach($lesCategories as $categorie)
            @if($categorie->getIdCategorie() == $idCat)
                <h1>Catégorie : {{$categorie->getLibelleCategorie()}} : </h1>
            @endif
        @endforeach

    @endif

@endsection

@section('contenu')

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark static-top specialNavbar">
        <div class="containerCat container">

            Changer la catégorie
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCategory" aria-controls="navbarCategory" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="ajout-button btn-outline-success" href="{{url('/ajoutFilm')}}">Ajouter un film
                <span class="sr-only">(current)</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarCategory">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/films')}}">Toutes les categories
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
            @foreach($lesCategories as $categorie)
                <div class="collapse navbar-collapse" id="navbarCategory">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('/films/'.$categorie->getIdCategorie())}}">{{$categorie->getLibelleCategorie()}}
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            @endforeach

        </div>
    </nav>
    @if(!empty($deleteMessage))
        <div class="badge-success">{{$deleteMessage}}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <th>Titre</th>
            <th>Année de sortie</th>
            <th>Détails du films</th>
            <th>Modifier le film</th>
            <th>Supprimer le film</th>
        </thead>
        @foreach($lesFilms as $film)
            <tr>
                <td> {{ $film->getTitre() }} </td>
                <td> {{ $film->getAnneeSortie()}}</td>
                <td> <a class="btn-outline-info" href="{{url('/detailsFilm/'.$film->getIdFilm())}}">Voir</a> </td>
                <td></td>
                <td> <a class="btn-outline-danger" href="{{url('/deleteFilm/'.$film->getIdFilm())}}">Supprimer</a> </td> </td>
            </tr>
        @endforeach
    </table>
@endsection


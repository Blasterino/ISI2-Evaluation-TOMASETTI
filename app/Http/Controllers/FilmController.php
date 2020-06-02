<?php

namespace App\Http\Controllers;

use App\modeles\CategorieDAO;
use Illuminate\Http\Request;
use App\Modeles\FilmDAO;

class FilmController extends Controller
{
    //
    public function getLesFilms(){
        $lesFilms = FilmDAO::getLesFilms();
        $lesCategories = CategorieDAO::getLesCategories();
        return view('listeFilms', ['lesFilms'=>$lesFilms, 'lesCategories'=>$lesCategories]);
    }

    public function getFilmsByCategory($id){
        $lesFilms = FilmDAO::getLesFilmsByCategory($id);
        $lesCategories = CategorieDAO::getLesCategories();
        return view('listeFilms', ['lesFilms'=>$lesFilms, 'lesCategories'=>$lesCategories, 'idCat'=>$id]);
    }

    public function getDetailsOnFilm(int $id){
        $monFilm = FilmDAO::getFilmById($id);
        return view('afficherFilm', compact('monFilm'));
    }

    public function deleteFilmById(int $id){
        FilmDAO::deleteFilmById($id);
        $lesFilms = FilmDAO::getLesFilms();
        $lesCategories = CategorieDAO::getLesCategories();
        return view('listeFilms', ['lesFilms'=>$lesFilms, 'lesCategories'=>$lesCategories, 'deleteMessage'=>"Le film a bien été supprimé."]);
    }
}

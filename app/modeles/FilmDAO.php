<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Metier\Film;

class FilmDAO extends Model
{
    //
    public static function getLesFilms()
    {
        $LesFilms = DB::table('films')
            ->get();
        $films = array();
        foreach($LesFilms as $film){
            $id_film = $film->id;
            $films[$id_film]=self::creerFilm($film);
        }
        return $films;
    }

    public static function getFilmById($id)
    {
        //La méthode first de QueryBuilder permet d'exécuter une requête retournant une seule ligne
        $film = DB::table('films')->where('id', '=', $id)->first();
        //Si le genre existe, on construit l'objet métier.
        //Dans le cas contraire, on lève une exception.
        if($film)
            return self::creerFilm($film);
        else
            throw new \Exception("Pas de film avec l'id : ".$id);
    }

    private static function creerFilm(\stdClass $pFilm){
        $film = new Film();
        $film->setIdFilm($pFilm->id);
        $film->setTitre($pFilm->titre);
        $film->setAnneeSortie($pFilm->anneeSortie);
        $film->setDescription($pFilm->description);
        $categorie = CategorieDAO::getCategorieById($pFilm->id);
        $film->setCategorie($categorie);
        return $film;
    }

    public static function getLesFilmsByCategory($idcat)
    {
        $LesFilms = DB::table('films')
            ->where('id_categorie', '=', $idcat)
            ->get();
        $films = array();
        foreach($LesFilms as $film){
            $id_film = $film->id;
            $films[$id_film]=self::creerFilm($film);
        }
        return $films;
    }

    public static function deleteFilmById($id){
        DB::table('films')->where('id', '=', $id)->delete();
    }


}

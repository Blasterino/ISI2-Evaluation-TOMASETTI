<?php

namespace App\modeles;

use App\Metier\Categorie;
use DB;
use Illuminate\Database\Eloquent\Model;

class CategorieDAO extends Model
{
    public static function getCategorieById($id)
    {
        $categorie = DB::table('categories')->where('id', '=', $id)->first();
        if($categorie)
            return self::creerCategorie($categorie);
        else
            throw new \Exception("Pas de categorie avec l'id : ".$id);
    }

    private static function creerCategorie(\stdClass $pCategorie){
        $categorie = new Categorie();
        $categorie->setIdCategorie($pCategorie->id);
        $categorie->setLibelleCategorie($pCategorie->libelle);
        return $categorie;
    }

    public static function getLesCategories()
    {
        $lesCategories = DB::table('categories')
            ->get();
        $categories = array();
        foreach($lesCategories as $category){
            $id_cat = $category->id;
            $categories[$id_cat]=self::creerCategorie($category);
        }
        return $categories;
    }
}

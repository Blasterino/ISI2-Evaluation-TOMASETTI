<?php


namespace App\Metier;


class Film
{
    private $idFilm;
    private $titre;
    private $anneeSortie;
    private $description;
    private $categorie;


    public function getIdFilm()
    {
        return $this->idFilm;
    }

    public function setIdFilm($idFilm): void
    {
        $this->idFilm = $idFilm;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    public function getAnneeSortie()
    {
        return $this->anneeSortie;
    }

    public function setAnneeSortie($anneeSortie): void
    {
        $this->anneeSortie = $anneeSortie;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }


}

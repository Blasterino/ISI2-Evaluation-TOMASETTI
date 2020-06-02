<?php


namespace App\Metier;


class Categorie
{
    private $idCategorie;
    private $libelleCategorie;

    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    public function setIdCategorie($idCategorie): void
    {
        $this->idCategorie = $idCategorie;
    }

    public function getLibelleCategorie()
    {
        return $this->libelleCategorie;
    }

    public function setLibelleCategorie($libelleCategorie): void
    {
        $this->libelleCategorie = $libelleCategorie;
    }



}

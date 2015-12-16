<?php

namespace MyMovies\Domain;

class Movie
{
    private $id;
    private $title;
    private $descriptionLongue;
    private $descriptionCourte;
    private $directeur;
    private $annee;
    private $image;
    
    private $categorie;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescriptionLongue() {
        return $this->descriptionLongue;
    }

    public function setDescriptionLongue($descriptionLongue) {
        $this->descriptionLongue = $descriptionLongue;
    }
    
      public function getDescriptionCourte() {
        return $this->descriptionCourte;
    }

    public function setDescriptionCourte($descriptionCourte) {
        $this->descriptionCourte = $descriptionCourte;
    }
    
      public function getDirecteur() {
        return $this->directeur;
    }

    public function setDirecteur($directeur) {
        $this->directeur = $directeur;
    }
    
      public function getAnnee() {
        return $this->annee;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }
    
      public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }
    
    
    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie) {
        $this->categorie = $categorie;
    }
}
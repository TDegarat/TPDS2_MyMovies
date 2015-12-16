<?php

namespace MyMovies\DAO;

use TPDS2_MyMovies\Domain\Movie;

class MovieDAO extends DAO    
{ 
    private $categorieDAO;

    public function setCategorieDAO(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }


    public function findAll() {
        $sql = "select * from movie order by mov_title";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $movies = array();
        foreach ($result as $row) {
            $movieId = $row['mov_id'];
            $moviests[$movieId] = $this->buildDomainObject($row);
        }
        return $movies;
    }


    public function findAllByFamille($familleId) {
        $sql = "select * from movie where cat_id=? order by mov_title";
        $result = $this->getDb()->fetchAll($sql, array($categorieId));
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $movies = array();
        foreach ($result as $row) {
            $movieId = $row['mov_id'];
            $movies[$movieId] = $this->buildDomainObject($row);
        }
        return $movies;
    }


    public function find($id) {
        $sql = "select * from movie where mov_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucun film ne correspond à l'identifiant " . $id);
    }

  
    
    protected function buildDomainObject($row) {
        $movie = new Movie();
        $movie->setId($row['mov_id']);
        $movie->setTitle($row['mov_title']);
        $movie->setDescriptionLongue($row['mov_description_long']);
        $movie->setDescriptionCourte($row['mov_description_courte']);
        $movie->setDirecteur($row['mov_director']);
        $movie->setAnnee($row['mov_year']);
        
 
        if (array_key_exists('cat_id', $row)) {
            // Trouve et définit la famille associée
            $categorieId = $row['cat_id'];
            $categorie = $this->categorieDAO->find($categorieId);
            $movie->setCategorie($categorie);
        }
   
        return $movie;
    }
}
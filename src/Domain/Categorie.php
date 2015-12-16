<?php

namespace MyMovies\Domain;

class Categorie
{
    /**
     * Article id.
     *
     * @var integer
     */
    private $id;

    /**
     * Article title.
     *
     * @var string
     */
    private $name;

    /**
     * Article content.
     *
     * @var string
     */


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
     public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}
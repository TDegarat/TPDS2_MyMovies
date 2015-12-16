<?php

namespace MyMovies\DAO;

use TPDS2_MyMovies\Domain\Categorie;

class CategorieDAO extends DAO
{
    /**
     * Renvoie la liste de toutes les familles, triées par libellé
     *
     * @return array La liste de toutes les familles
     */
    public function findAll() {
        $sql = "select * from category order by cat_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $categories = array();
        foreach ($result as $row) {
            $familleId = $row['cat_id'];
            $familles[$familleId] = $this->buildDomainObject($row);
        }
        return $categories;
    }

    /**
     * Renvoie une famille à partir de son identifiant
     *
     * @param integer $id L'identifiant de la famille
     *
     * @return \GSB\Domain\Famille|Lève un exception si aucune famille ne correspond
     */
    public function find($id) {
        $sql = "select * from famille where cat_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucune catégorie ne correspond à l'identifiant " . $id);
    }

    /**
     * Crée un objet Famille à partir d'une ligne de résultat BD
     *
     * @param array $row La ligne de résultat BD
     *
     * @return \GSB\Domain\Famille
     */
    protected function buildDomainObject($row) {
        $categorie = new Categorie();
        $categorie->setId($row['cat_id']);
        $categorie->setLibelle($row['cat_name']);
        return $categorie;
    }
}
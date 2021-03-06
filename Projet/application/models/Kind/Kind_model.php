<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Musician_model
 *
 * @author Marco
 */
class Kind_model extends CI_Model
{
    protected $stmt;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getKinds()
    {
        $query = "SELECT Genre.Code_Genre, Genre.Libellé_Abrégé"
                . " FROM Genre";
        return $this->db->query($query);
    }
    
    public function getKindBeginningBy($initial)
    {
        $query = "SELECT Musicien.Code_Musicien, COALESCE(Musicien.Nom_Musicien, '(nom inconnu)'), COALESCE(Musicien.Prénom_Musicien, '(prénom inconnu)'), Musicien.Photo
                  FROM Musicien
                  INNER JOIN Direction ON Musicien.Code_Musicien = Direction.Code_Musicien
                  WHERE Musicien.Nom_Musicien LIKE :initial'
                  GROUP BY Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prénom_Musicien, Musicien.Photo
                  ORDER BY Musicien.Nom_Musicien";
        
        return $this->db->query($query, [':initial' => $initial.'%']);
    }
}

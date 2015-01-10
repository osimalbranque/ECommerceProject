<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Musician_model
 *
 * @author Osiris
 */
class Orchestra_model extends CI_Model
{
    protected $stmt;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getOrchestraBeginningBy($initial)
    {
        $query = "SELECT Musicien.Code_Musicien, COALESCE(Musicien.Nom_Musicien, '(nom inconnu)'), COALESCE(Musicien.Prénom_Musicien, '(prénom inconnu)'), Musicien.Photo
                  FROM Musicien
                  INNER JOIN Direction ON Musicien.Code_Musicien = Direction.Code_Musicien
                  INNER JOIN Orchestra ON Direction.Code_Orchestre = Orchestre.Code_Orchestre
                  WHERE Musicien.Nom_Musicien LIKE :initial'
                  GROUP BY Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prénom_Musicien, Musicien.Photo
                  ORDER BY Musicien.Nom_Musicien";
        
        return $this->db->query($query, [':initial' => $initial.'%']);
    }
}

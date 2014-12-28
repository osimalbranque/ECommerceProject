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
class Musician_model extends CI_Model
{
    
    protected $table = 'Musicien';
    protected $stmt;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getMusicianPhoto($musician_code)
    {
        $query = "SELECT Musicien.Photo
                  FROM Musicien
                  WHERE Musicien.Code_Musicien = :code";
        
        $this->stmt = $this->db->conn_id->prepare($query);
        
        return $this->db->query($query, [':code' => $musician_code])->result();
    }
    
    public function getComposersNameBeginningBy($initial)
    {
        $query = "SELECT Musicien.Code_Musicien, COALESCE(Musicien.Nom_Musicien, '(nom inconnu)'), COALESCE(Musicien.Prénom_Musicien, '(prénom inconnu)'), Musicien.Photo
                  FROM Musicien
                  INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien
                  WHERE Musicien.Nom_Musicien LIKE :initial
                  GROUP BY Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prénom_Musicien, Musicien.Photo
                  ORDER BY Musicien.Nom_Musicien";
        
        return $this->db->query($query, [':initial' => $initial.'%']);
    }
    
    public function getInterpretsBeginningBy($initial)
    {
        $query = "SELECT Musicien.Code_Musicien, COALESCE(Musicien.Nom_Musicien, '(nom inconnu)'), COALESCE(Musicien.Prénom_Musicien, '(prénom inconnu)'), Musicien.Photo
                 FROM Musicien
                 INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien
                 WHERE Musicien.Nom_Musicien LIKE :initial
                 GROUP BY Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prénom_Musicien, Musicien.Photo
                 ORDER BY Musicien.Nom_Musicien";
        
        return $this->db->query($query, [':initial' => $initial.'%']);
    }
    
    public function getBandMastersBeginningBy($initial)
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

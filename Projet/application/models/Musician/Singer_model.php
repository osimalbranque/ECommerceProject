<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Singer_model
 *
 * @author osi
 */
class Singer_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAllSingers()
    {
        $query = "SELECT Musicien.Code_Musicien Code_Musicien, COALESCE(Musicien.Nom_Musicien, '(nom inconnu)') Nom_Musicien, COALESCE(Musicien.Prénom_Musicien, '(prénom inconnu)') Prénom_Musicien
                 FROM Musicien
                 INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien
                 GROUP BY Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prénom_Musicien
                 ORDER BY Musicien.Nom_Musicien";
        
        $data = $this->db->query($query);
        return $data;
    }
    
    public function getSingersNamesBeginningBy($initial)
    {
        $query = "SELECT Musicien.Code_Musicien Code_Musicien, COALESCE(Musicien.Nom_Musicien, '(nom inconnu)') Nom_Musicien, COALESCE(Musicien.Prénom_Musicien, '(prénom inconnu)') Prénom_Musicien
                 FROM Musicien
                 INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien
                 WHERE Musicien.Nom_Musicien LIKE ?
                 GROUP BY Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prénom_Musicien
                 ORDER BY Musicien.Nom_Musicien";
        
        $data = $this->db->query($query, array($initial.'%'));
        return $data;
    }
}

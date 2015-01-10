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
    
    public function getAllOrchestra()
    {
        $query = "SELECT Orchestre.Code_Orchestre, Orchestre.Nom_Orchestre"
                . " FROM Orchestre";
        
        return $this->db->query($query);
    }
    
    public function getOrchestraBeginningBy($initial)
    {
        $query = "SELECT Orchestre.Code_Orchestre, Orchestre.Nom_Orchestre"
                . " FROM Orchestre"
                . " WHERE Orchestre.Nom_Orchestre LIKE ?";
        
        return $this->db->query($query, array("'".$initial."%'"));
    }
}

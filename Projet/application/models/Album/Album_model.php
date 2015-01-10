<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Album_model
 *
 * @author osi
 */
class Album_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getSamplesByAlbum($album_code)
    {
        $query = "SELECT Enregistrement.Code_Morceau, Enregistrement.Titre, Enregistrement.Prix"
                . " FROM Enregistrement"
                . " INNER JOIN Composition_Disque ON Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau"
                . " INNER JOIN Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque"
                . " INNER JOIN Album ON Disque.Code_Album = ?"
                . " WHERE Album.Code_Album = ?";
        return $this->db->query($query, array($album_code, $album_code));
    }
}

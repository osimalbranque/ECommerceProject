<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Composer_model
 *
 * @author osi
 */
class Composer_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getComposersNamesBeginningBy($initial)
    {
        $query = "SELECT Musicien.Code_Musicien Code_Musicien, COALESCE(Musicien.Nom_Musicien, '(nom inconnu)') Nom_Musicien, COALESCE(Musicien.Prénom_Musicien, '(prénom inconnu)') Prénom_Musicien
                  FROM Musicien
                  INNER JOIN Composer ON Musicien.Code_Musicien = Composer.Code_Musicien
                  WHERE Musicien.Nom_Musicien LIKE ?
                  GROUP BY Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prénom_Musicien
                  ORDER BY Musicien.Nom_Musicien";
        $data = $this->db->query($query, array($initial.'%'));
        //GROUP BY Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prénom_Musicien
        return $data;
    }
    
    public function getOperasFromComposer($composer_code)
    {
        $query = "SELECT Oeuvre.Titre_Oeuvre"
                . " FROM Oeuvre"
                . " INNER JOIN Composer ON Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre"
                . " INNER JOIN Musicien ON Composer.Code_Musicien = ?";
        return $this->db->query($query, array($composer_code));
    }
    
    public function getAlbumsFromComposer($composer_code)
    {
        $query = "SELECT Album.Code_Album, Album.Titre_Album, Album.Année_Album, Album.Pochette"
                . " FROM Album"
                . " INNER JOIN Disque ON Disque.Code_Album = Album.Code_Album"
                . " INNER JOIN Composition_Disque ON Disque.Code_Disque = Composition_Disque.Code_Disque"
                . " INNER JOIN Enregistrement ON Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau"
                . " INNER JOIN Composition ON Enregistrement.Code_Composition = Composition.Code_Composition"
                . " INNER JOIN Composition_Oeuvre ON Composition_Oeuvre.Code_Composition = Composition.Code_Composition"
                . " INNER JOIN Oeuvre ON Oeuvre.Code_Oeuvre = Composition_Oeuvre.Code_Oeuvre"
                . " INNER JOIN Composer ON Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre"
                . " INNER JOIN Musicien ON Composer.Code_Musicien = ?"
                . " WHERE Musicien.Code_Musicien = ?";
        
        return $this->db->query($query, array($composer_code, $composer_code));
    }
}

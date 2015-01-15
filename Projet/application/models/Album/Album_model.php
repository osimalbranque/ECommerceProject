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
    
    public function getAllAlbums()
    {
        $query = "SELECT Album.Code_Album, Album.Titre_Album, Album.Année_Album, Album.Pochette"
                . " FROM Album";
        return $this->db->query($query);
    }
    
    public function getAlbumsBeginningBy($initial)
    {
        $query = "SELECT Album.Code_Album, Album.Titre_Album, Album.Année_Album, Album.Pochette"
                . " FROM Album WHERE Album.Titre_Album LIKE ?";
        return $this->db->query($query, array($initial.'%'));
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
    
    public function getAlbumsByKind($kind_code)
    {
        $query = "SELECT Album.Code_Album, Album.Titre_Album, Album.Année_Album, Album.Pochette"
                . " FROM Album"
                . " INNER JOIN Genre ON Genre.Code_Genre = Album.Code_Genre"
                . " WHERE Genre.Code_Genre = ?";
        return $this->db->query($query, array($kind_code));
    }
    
    public function getAlbumsBySinger($singer_code)
    {
         $query = "SELECT Album.Code_Album, Album.Titre_Album, Album.Année_Album"
                . " FROM Album"
                 . " INNER JOIN Genre ON Genre.Code_Genre = Album.Code_Genre"
                 . " INNER JOIN Musicien ON Musicien.Code_Genre = Genre.Code_Genre"
                 . " INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien"
                . " WHERE Musicien.Code_Musicien = ?";
         
         return $this->db->query($query, array($singer_code));
    }
}

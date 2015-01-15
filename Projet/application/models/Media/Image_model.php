<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image_model
 *
 * @author osi
 */
class Image_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getMusicianImage($musician_code)
    {   
        $query = "SELECT Musicien.Photo Photo
                  FROM Musicien
                  WHERE Musicien.Code_Musicien = ?";
        
        $row = $this->db->query($query, array($musician_code));
        if($row->num_rows())
        {
            $data = $row->row_array();
            $row->free_result();
        }
        $lob = $data['Photo'];
        
        return (isset($lob)) ? $lob : '';
    }
    
    public function getAlbumImage($album_code)
    {
        $query = "SELECT Album.Pochette Pochette"
                . " FROM Album"
                . " WHERE Album.Code_Album = ?";
        
        $row = $this->db->query($query, array($album_code));
        if($row->num_rows())
        {
            $data = $row->row_array();
            $row->free_result();
        }
        $lob = $data['Pochette'];
        
        return (isset($lob)) ? $lob : '';
    }
    
    public function getInstrumentImage($instrument_code)
    {
        $query = "SELECT Instrument.Image"
                . " FROM Instrument"
                . " WHERE Instrument.Code_Instrument = ?";
        
        $row = $this->db->query($query, array($instrument_code));
        if($row->num_rows())
        {
            $data = $row->row_array();
            $row->free_result();
        }
        $lob = $data['Image'];
        
        return (isset($lob)) ? $lob : '';
    }
}

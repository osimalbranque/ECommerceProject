<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Musician_model
 *
 * @author osi
 */
class Musician_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getMusicianByCode($musician_code)
    {
        $query = "SELECT Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prénom_Musicien"
                . " FROM Musicien"
                . " WHERE Musicien.Code_Musicien = ?";
        return $this->db->query($query, array($musician_code));
    }
    
    public function getMusiciansByInstrument($instrument_code)
    {
        $query = "SELECT DISTINCT Musicien.Code_Musicien, Musicien.Nom_Musicien, Musicien.Prénom_Musicien"
                . " FROM Musicien"
                . " INNER JOIN Interpréter ON Musicien.Code_Musicien = Interpréter.Code_Musicien"
                . " INNER JOIN Instrument ON Musicien.Code_Instrument = Instrument.Code_Instrument"
                . " WHERE Instrument.Code_Instrument = ?";
        return $this->db->query($query, array($instrument_code));
    }
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Instrument_model extends CI_Model
{
    protected $stmt;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getAllInstruments()
    {
        $query = "SELECT Instrument.Code_Instrument, Instrument.Nom_Instrument, Instrument.Image"
                . " FROM Instrument";
        return $this->db->query($query);
    }
}
?>
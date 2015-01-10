<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sample_model
 *
 * @author osi
 */
class Sample_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getMusicianSample($sample_code)
    {
        $query = "SELECT Extrait
                  FROM Enregistrement
                  WHERE Enregistrement.Code_Morceau = ?";
        $row = $this->db->query($query, array($sample_code));
        if($row->num_rows())
        {
            $data = $row->row_array();
            $row->free_result();
        }
        $lob = $data['Extrait'];
        
        return (isset($lob)) ? $lob : '';
    }
}

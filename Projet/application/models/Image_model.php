<?php

use PDO;

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
class Image_model extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getMusicianImage($musician_code)
    {
        $query = "SELECT Musicien.Photo
                  FROM Musicien
                  WHERE Musicien.Code_Musicien = :code";
        
        $stmt = $this->db->conn_id->prepare($query);
        $stmt->execute([':code' => $musician_code]);
        $stmt->bindColumn(1, $lob, PDO::PARAM_LOB);
        $stmt->fetch(PDO::FETCH_BOUND);
        
        $data = array('lob' => $lob);
        
        return $data;
    }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart_model
 *
 * @author osi
 */
class Cart_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getPurchases($subscriber_code)
    {
        $query = "SELECT Enregistrement.Code_Morceau, Enregistrement.Titre, Enregistrement.Durée, Enregistrement.Nom_de_Fichier"
                . "FROM Enregistrement"
                . "INNER JOIN Achat ON Achat.Code_Enregistrement = Enregistrement.Code_Enregistrement"
                . "INNER JOIN Abonné ON Abonné.Code_Abonné = ?"
                . "WHERE Abonné.Code_Abonné = ?";
        
        return $this->db->query($query, array($subscriber_code, $subscriber_code));
    }
    
    public function confirmPurchase($subscriber_code, $sample_code)
    {
        $this->db->set('Code_Abonné', $subscriber_code);
        $this->db->set('Code_Enregistrement', $sample_code);
        
        $this->db->insert('Achat');
    }
}

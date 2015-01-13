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
    
    public function addOrder($sample_code)
    {
        $orders = $this->session->userdata('purchases_list');
        $orders[] = $sample_code;
        $this->session->set_userdata('purchases_list', $orders);
    }
    
    public function deletePurchase($sample_code)
    {
        $purchases_updated = $this->session->userdata('purchases_list');
        unset($purchases_updated[array_search($sample_code, $purchases_updated)]);
        $this->session->set_userdata('purchases_list', $purchases_updated);
    }
    
    public function totalCost()
    {
        $total_cost = 0;
        $purchases_updated = $this->session->userdata('purchases_list');
        for($i = 0; $i < count($purchases_updated); $i++)
        {
            $total_cost += $purchases_updated[$i];
        }
        
        return $total_cost;
    }
    
    public function nbArticles()
    {
        return count($this->session->userdata('purchases_list'));
    }
    
    public function getOrders($orders = array())
    {
        return $this->db->select('Code_Morceau, Titre, Durée, Prix')
                        ->from('Enregistrement')
                        ->where_in('Code_Morceau', $orders)
                        ->get();
    }
    
    public function getPurchases($subscriber_code)
    {
        $query = "SELECT Enregistrement.Code_Morceau, Enregistrement.Titre, Enregistrement.Durée, Enregistrement.Nom_de_Fichier"
                . " FROM Enregistrement"
                . " INNER JOIN Achat ON Achat.Code_Enregistrement = Enregistrement.Code_Morceau"
                . " INNER JOIN Abonné ON Achat.Code_Abonné = ?"
                . " WHERE Abonné.Code_Abonné = ?";
        
        return $this->db->query($query, array($subscriber_code, $subscriber_code));
    }
    
    public function confirmPurchase($subscriber_code, $sample_code)
    {
        $this->db->set('Code_Abonné', $subscriber_code);
        $this->db->set('Code_Enregistrement', $sample_code);
        
        $this->db->insert('Achat');
    }
    
    public function debitMoney($subscriber_code, $sample_code)
    {
        $sample_price_query = "SELECT Enregistrement.Prix "
                . " FROM Enregistrement"
                . " WHERE Enregistrement.Code_Morceau = ?";
        $sample_price = $this->db->query($sample_price_query, array($sample_code))
                                 ->result_array()['Prix'];
        
        $subscriber_credit_query = "SELECT Abonné.Credit"
                                   . " FROM Abonné"
                                   . " WHERE Abonné.Code_Abonné = ?";
        $subscriber_credit = $this->db->query($subscriber_credit_query, array($subscriber_code))
                                 ->result_array()['Credit'];
        
        if($subscriber_credit - $sample_price > 0)
        {
            $purchases_updated = $this->session->userdata('purchases_list');
            unset($purchases_updated[array_search($sample_code, $purchases_updated)]);
            
            $data = array('Credit' => $subscriber_credit - $sample_price);
            $this->db->where('Code_Abonné', $subscriber_code);
            $this->db->update($data);
            return true;
        }
        
        return false;
    }
}

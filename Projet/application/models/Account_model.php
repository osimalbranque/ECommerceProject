<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account
 *
 * @author osi
 */
class Account_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function insertSubscriber($datas = array())
    {
        $fields = array('Abonné.Nom_Abonné' => 'subscriber_name', 
                         'Abonné.Prénom_Abonné' => 'subscriber_surname', 
                         'Abonné.Login' => 'subscriber_login', 
                         'Abonné.Password' => 'subscriber_password',
                        'Abonné.Email' => 'subscriber_email',
                        'Abonné.Adresse' => 'subscriber_address', 
                        'Abonné.Code_Postal' => 'subscriber_postcode',
                        'Abonné.Ville' => 'subscriber_town', 
                        'Abonné.Code_Pays' => 'subscriber_country');
        
        foreach($fields as $key => $field)
        {
            if(array_key_exists($field, $datas))
                    $this->db->set($key, $datas[$field]); // etest
        }
        
        $this->db->insert('Abonné');
    }
    
    public function loginNumber($login)
    {
        $this->db->select('Abonné.Code_Abonné');
        $this->db->from('Abonné');
        $this->db->where('Abonné.Login', $login);
        
        return $this->db->count_all_results();
    }
    
    public function passwordWithLogin($login, $passwd)
    {
        $query = "SELECT Abonné.Password"
                . "FROM Abonné"
                . "WHERE Abonné.Login = ? AND Abonné.Password = ?";
        
        return $this->db->query($query, array($login, $passwd));
    }
    
    public function getSubscriberCode($login)
    {
        $query = "SELECT Abonné.Code_Abonné"
                . " FROM Abonné"
                . " WHERE Abonné.Login = ?";
        return $this->db->query($query, array($login))->row_array();
    }
}

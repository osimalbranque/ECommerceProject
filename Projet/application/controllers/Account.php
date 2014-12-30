<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account
 *
 * @author Osiris
 */
class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function Register()
    {
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         
         $config = array(
                   array('field' => 'subscriber_name',
                         'label' => 'Nom'),
                    array('field' => 'subscriber_surname',
                         'label' => 'Prénom'),
                   array('field' => 'subscriber_login',
                         'label' => 'Login',
                         'rules' => 'required'),
                   array('field' => 'subscriber_password',
                         'label' => 'Mot de passe',
                         'rules' => 'required|min_length[6]'),
                   array('field' => 'subscriber_email',
                         'label' => 'Email',
                         'rules' => 'valid_email'),
                   array('field' => 'subscriber_address',
                         'label' => 'Adresse'),
                   array('field' => 'subscriber_postcode',
                         'label' => 'Code postal'),
                   array('field' => 'subscriber_town',
                         'label' => 'Ville'),
                   array('field' => 'subscriber_country',
                         'label' => 'Code pays'),
         );
        
        if ($this->form_validation->run() == FALSE)
                $this->load->view('Account/register');
        else
                $this->load->view('Account/register_state');
    }
    
    public function Login()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $config = array(
                   array('field' => 'subscriber_login',
                         'label' => 'Login',
                         'rules' => 'required'),
                   array('field' => 'subscriber_password',
                         'label' => 'Mot de passe',
                         'rules' => 'required|min_length[6]'),
         );
        
        if ($this->form_validation->run() == FALSE)
                $this->load->view('Account/login');
        else
                $this->load->view('Account/login_state');
    }
}

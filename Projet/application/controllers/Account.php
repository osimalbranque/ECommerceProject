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
        //$this->load->library('session');
        
        $this->load->view('General/header');
        if(!$this->session->userdata('subscriber_id'))
            $this->load->view('General/dropdown');
        else
            $this->load->view('General/connected_dropdown');
    }
    
    public function Register()
    {
         $this->load->helper(array('form', 'url'));
         $this->load->library('form_validation');
         
         $config = array(
                   array('field' => 'subscriber_name',
                         'label' => 'Nom',
                         'rules' => 'required'),
                    array('field' => 'subscriber_surname',
                         'label' => 'Prénom',
                          'rules' => 'required'),
                   array('field' => 'subscriber_login',
                         'label' => 'Login',
                         'rules' => 'required|callback_uniqueLogin'),
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
         
         $this->form_validation->set_rules($config);
        
        if ($this->form_validation->run() == FALSE)
                $this->load->view('Account/register');
        else
        {
                $this->load->model('Account_model');
                
                $fields = array('subscriber_name', 
                         'subscriber_surname', 
                         'subscriber_login', 
                         'subscriber_password',
                        'subscriber_email',
                        'subscriber_address', 
                        'subscriber_postcode',
                        'subscriber_town', 
                        'subscriber_country');
                foreach($fields as $field)
                    if($this->input->post($field) != false)
                        $fields[$field] = $this->input->post($field);
                $this->Account_model->insertSubscriber($fields);
                
                $this->load->view('Account/register_state');
        }
        
        $this->load->view('General/footer');
    }
    
    public function Login()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $config = array(
                   array('field' => 'subscriber_login',
                         'label' => 'Login',
                         'rules' => 'required|callback_existingLogin'),
                   array('field' => 'subscriber_password',
                         'label' => 'Mot de passe',
                         'rules' => 'required|callback_rightPassword'),
         );
        
        $this->form_validation->set_rules($config);
        
        if ($this->form_validation->run() == FALSE)
                $this->load->view('Account/login');
        else
        {
                $this->load->library('session');
                $this->load->model('Account_model');
                
                $this->session->set_userdata('subscriber_id',
                                             $this->Account_model
                                                  ->getSubscriberCode
                                                 ($this->input
                                                        ->post('subscriber_login'))[utf8_decode('Code_Abonné')]);
                $this->session->set_userdata('purchases_list', array());
                $this->load->view('Account/login_state');
        }
        
        $this->load->view('General/footer');
    }
    
    public function Logout()
    {
        //$this->load->view('Account/logout');
        //$this->session->unset_userdata(array('subscriber_id' => ''));
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->session->sess_destroy();
        redirect('index.php');
    }
    
    public function rightPassword($password)
    {
        if($this->input->post('subscriber_login'))
        {
            if(!isset($this->Account_model))
            {
                $this->load->model('Account_model');
                $passwdFit = $this->Account_model->passwordWithLogin($this->input->post('subscriber_login'), $password)->num_rows();
                
                if($passwdFit != 1)
                    $this->form_validation->set_message('rightPassword', "Votre mot de passe est incorrect.");
                return $passwdFit == 1;
            }
        }
        //return false;
    }
    
    public function existingLogin($login)
    {
        if(!isset($this->Account_model))
            $this->load->model('Account_model');
        $nb_logins = $this->Account_model->loginNumber($login);
        if($nb_logins != 1)
            $this->form_validation->set_message('existingLogin', "Vous n'êtes pas identifié comme abonné.");
        return $nb_logins == 1;
    }
    
    private function uniqueLogin($login)
    {
        if(!isset($this->Account_model))
            $this->load->model('Account_model');
        $nb_logins = $this->Account_model->loginNumber($login);
        if($nb_logins != 0)
            $this->form_validation->set_message('uniqueLogin', 'Ce login est déjà réservé.');
        return $nb_logins == 0;
    }
}

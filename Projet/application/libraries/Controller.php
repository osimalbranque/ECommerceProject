<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author osi
 */
class Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function loadPage()
    {
        $this->load->library('session');
        $this->load->view('header');
        
        loadMenu();
    }
    
    protected function loadMenu()
    {
        if(!$this->session->userdata('subscriber_id'))
            $this->load->view('General/connected_dropdown');
        else
            $this->load->view('General/dropdown');
    }
    
}

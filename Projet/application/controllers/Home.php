<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author osimalbranque
 */

class Home extends CI_Controller
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
    
    public function index() 
    {
        $this->load->view('index');
        $this->load->view('General/footer');
    }
    
    public function About()
    {
        $this->load->view('General/about');
        $this->load->view('General/footer');
    }
}

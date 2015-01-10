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
    }
    
    public function index() 
    {
        $this->load->view('General/header');
        $this->load->view('General/dropdown');
        $this->load->view('index');
    }
}

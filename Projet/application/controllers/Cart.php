<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShoppingCart
 *
 * @author osi
 */


class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        
        $this->load->view('General/header');
        if(!$this->session->userdata('subscriber_id'))
            $this->load->view('General/connected_dropdown');
        else
            $this->load->view('General/dropdown');
    }
    
    public function index()
    {
        if(!isset($this->session->userdata('subscriber_id')))
            $this->load->view('Account/login');
        else
        {
            $this->load->view('Cart/purchases');
        }
    }
}

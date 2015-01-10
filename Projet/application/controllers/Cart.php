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
    }
    
    public function index()
    {
        $this->load->library('session');
        if(!isset($this->session->userdata('subscriber_id')))
            $this->load->view('Account/login');
        else
        {
            $this->load->view('Cart/purchases');
        }
    }
}

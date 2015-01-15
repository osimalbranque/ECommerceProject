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
       //$this->load->library('session');
        
        $this->load->view('General/header');
        if(!$this->session->userdata('subscriber_id'))
            $this->load->view('General/dropdown');
        else
            $this->load->view('General/connected_dropdown');
    }
    
    public function AddOrder($sample_code)
    {
        if(!$this->session->userdata('subscriber_id'))
            $this->load->view('Account/login');
        else
        {
            $this->load->model('Cart/Cart_model');
            $this->Cart_model->addOrder($sample_code);
        }
        
        $this->load->view('General/footer');
    }
    
    public function Orders()
    {
        if(!$this->session->userdata('subscriber_id'))
            $this->load->view('Account/login');
        else
        {
            $this->load->model('Cart/Cart_model');
            
            $data = array();
            $data['data'] = $this->Cart_model
                                 ->getOrders($this->session->userdata('purchases_list'));
            
            var_dump($data['data']);
            
            $this->load->view('Cart/orders', $data);
        }
        
        $this->load->view('General/footer');
    }
    
    public function Purchases()
    {
         if(!$this->session->userdata('subscriber_id'))
            $this->load->view('Account/login');
        else
        {
            $this->load->model('Cart/Cart_model');

            $data = array();
            $data['data'] = $this->Cart_model
                                 ->getPurchases($this->session->userdata('subscriber_id'));

            $this->load->view('Cart/orders', $data);
        }
        
        $this->load->view('General/footer');
    }
}

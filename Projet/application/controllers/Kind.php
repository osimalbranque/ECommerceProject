<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Kind
 *
 * @author osi
 */
class Kind extends CI_Controller
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
    
    public function Kinds()
    {
        $this->load->model('Kind/Kind_model');
        $data = array();
        $data['data'] = $this->Kind_model->getKinds();
        
        $this->load->view('Kind/kinds', $data);
    }
    
    public function About_Kind($code)
    {
        $this->load->model('Album/Album_model');
        
        $data = array();
        $data['data'] = $this->Album_model->getAlbumsByKind($code);
        
        $this->load->view('Kind/about_kind', $data);
    }
}
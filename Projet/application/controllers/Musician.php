<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Musician
 *
 * @author Osiris
 */
class Musician extends CI_Controller
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
    
    public function AllComposers()
    {
        $this->load->model('Musician/Composer_model');
        $data = array();
        $data['data'] = $this->Composer_model->getAllComposers();
        $this->load->view('Musician/composers', $data);
    }
    
    public function Composer($initial)
    {
        $this->load->model('Musician/Composer_model');
        $data = array();
        $data['data'] = $this->Composer_model->getComposersNamesBeginningBy($initial);
        $this->load->view('Musician/composers', $data);
    }
    
    public function About_Composer($composer_code)
    {
        $this->load->model('Musician/Composer_model');
        $data = array();
        $data['data'] = $this->Composer_model->getAlbumsFromComposer($composer_code);
        $this->load->view('Musician/about_composer', $data);
    }
    
    public function AllSingers()
    {
        $this->load->model('Musician/Singer_model');
        $data = array();
        $data['data'] = $this->Singer_model->getAllSingers();
        $this->load->view('Musician/singers', $data);
    }
    
    public function Singer($initial)
    {
            $this->load->model('Musician/Singer_model');
            $data = array();
            $data['data'] = $this->Singer_model->getSingersNamesBeginningBy($initial);
            $this->load->view('Musician/singers', $data);
    }
    
    public function AllBandmasters()
    {
        $this->load->model('Musician/Bandmaster_model');
        $data = array();
        $data['data'] = $this->Bandmaster_model->getAllBandMasters();
        $this->load->view('Musician/bandmaster', $data);
    }
    
    public function Bandmasters($letter)
    {
        $this->load->model('Musician/Bandmaster_model');
        $data = array();
        $data['data'] = $this->Bandmaster_model->getBandMastersBeginningBy($letter);
        $this->load->view('Musician/bandmaster', $data);
    }
    
    public function AllOrchestra()
    {
        $this->load->model('Orchestra_model');
        $data = array();
        $data['data'] = $this->Orchestra_model->getAllOrchestra();
        $this->load->view('Musician/orchestra', $data);
        
    }
}

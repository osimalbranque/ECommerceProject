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
    
    public function Musicians($musician_code)
    {
        $this->load->model('Album/Album_model');
        
        $data = array();
        $data['data'] = $this->Album_model->getAlbumsBySinger($musician_code);
        $this->load->view('Musician/about_singers', $data);
        $this->load->view('General/footer');
    }
    
    public function AllComposers()
    {
        $this->load->model('Musician/Composer_model');
        $data = array();
        $data['data'] = $this->Composer_model->getAllComposers();
        $this->load->view('Musician/composers', $data);
        $this->load->view('General/footer');
    }
    
    public function Composer($initial)
    {
        $this->load->model('Musician/Composer_model');
        
        $data = array();
        $data['data'] = $this->Composer_model->getComposersNamesBeginningBy($initial);
        $this->load->view('Musician/composers', $data);
        $this->load->view('General/footer');
    }
    
    public function About_Composer($composer_code)
    {
        $this->load->model('Musician/Composer_model');
        $this->load->model('AmazonECS_model');
        $this->AmazonECS_model->initialise("AKIAIWYU42S4K5GU6CHA", "AoevaX9ZG0GTS8CD/nbQdhZ5K5vVZwMrsl5JA1NP", 'fr', "clasicofolies");
        $this->AmazonECS_model->category("Music");
        
        $data = array();
        $data['data'] = $this->Composer_model->getAlbumsFromComposer($composer_code);
        $data['composer_name'] = array();
        $data['composer_name'] = $this->Composer_model->getComposerName($composer_code)->result_array();
        
        $response = $this->AmazonECS_model->responseGroup('Large')->search($data['composer_name'][0]['Nom_Musicien'].' '.$data['composer_name'][0][utf8_decode('Prénom_Musicien')]);
        
        $data['response'] = $response;
        $this->load->view('Musician/about_composer', $data);
        $this->load->view('General/footer');
    }
    
    public function AllSingers()
    {
        $this->load->model('Musician/Singer_model');
        $data = array();
        $data['data'] = $this->Singer_model->getAllSingers();
        $this->load->view('Musician/singers', $data);
        $this->load->view('General/footer');
    }
    
    public function Singer($initial)
    {
            $this->load->model('Musician/Singer_model');
            $data = array();
            $data['data'] = $this->Singer_model->getSingersNamesBeginningBy($initial);
            $this->load->view('Musician/singers', $data);
            $this->load->view('General/footer');
    }
    
    public function AllBandmasters()
    {
        $this->load->model('Musician/Bandmaster_model');
        $data = array();
        $data['data'] = $this->Bandmaster_model->getAllBandMasters();
        $this->load->view('Musician/bandmaster', $data);
        $this->load->view('General/footer');
    }
    
    public function Bandmasters($letter)
    {
        $this->load->model('Musician/Bandmaster_model');
        $data = array();
        $data['data'] = $this->Bandmaster_model->getBandMastersBeginningBy($letter);
        $this->load->view('Musician/bandmaster', $data);
        $this->load->view('General/footer');
    }
    
    public function AllOrchestra()
    {
        $this->load->model('Orchestra_model');
        $data = array();
        $data['data'] = $this->Orchestra_model->getAllOrchestra();
        $this->load->view('Musician/orchestra', $data);
        $this->load->view('General/footer');
        
    }
}

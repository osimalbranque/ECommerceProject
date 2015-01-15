<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Album
 *
 * @author osi
 */
class Album extends CI_Controller
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
    
    public function test($album_code)
    {   
        $this->load->model('Album/Album_model');
        
        $data = array();
        $data['data'] = $this->Album_model->getSamplesByAlbum($album_code);
        if(!$this->session->userdata('subscriber_id'))
            $data['subscriber_online'] = false;
        else
            $data['subscriber_online'] = true;
        
        $this->load->view('Album/album', $data);  
        
        $this->load->view('General/footer');
    }
    
    public function Albums($letter)
    {
        $this->load->model('Album/Album_model');
        $data = array();
        $data['data'] = $this->Album_model->getAlbumsBeginningBy($letter);
        
        $this->load->view('Album/everything', $data);
        
        $this->load->view('General/footer');
    }
    
    public function Everything()
    {
        $this->load->model('Album/Album_model');
        
        $data = array();
        $data['data'] = $this->Album_model->getAllAlbums();
        
        $this->load->view('Album/everything', $data);
        
        $this->load->view('General/footer');
    }
}

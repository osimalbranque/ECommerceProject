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
    }
    
    public function test($album_code)
    {
        $this->load->view('General/header');
        $this->load->view('General/dropdown');
        
        $this->load->model('Album/Album_model');
        
        $data = array();
        $data['data'] = $this->Album_model->getSamplesByAlbum($album_code);
        
        $this->load->view('Album/album', $data);
        
        
    }
}

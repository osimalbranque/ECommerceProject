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
        
        $this->load->library('session');
        
        $this->load->view('General/header');
        if(!$this->session->userdata('subscriber_id'))
            $this->load->view('General/connected_dropdown');
        else
            $this->load->view('General/dropdown');
    }
    
    public function Composer()
    {
        if(!$this->input->post('initial'))
        {
            $this->load->view('Musician/composers');
        }
        else
        {
            $this->load->model('Musician/Composer_model');
            $data = array();
            $initial = $this->input->post('initial');
            $data['data'] = $this->Composer_model->getComposersNamesBeginningBy($initial);
            $this->load->view('Musician/composers', $data);
        }
    }
    
    public function About_Composer($composer_code)
    {
        $this->load->model('Musician/Composer_model');
        $data = array();
        $data['data'] = $this->Composer_model->getAlbumsFromComposer($composer_code);
        $this->load->view('Musician/about_composer', $data);
    }
    
    public function Singer()
    {
        if(!$this->input->post('initial'))
        {
            $this->load->view('Musician/singers');
        }
        else
        {
            $this->load->model('Musician/Singer_model');
            $data = array();
            $initial = $this->input->post('initial');
            $data['data'] = $this->Singer_model->getSingersNamesBeginningBy($initial);
            $this->load->view('Musician/singers', $data);
        }
    }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Instrument
 *
 * @author Marco
 */
class Instrument extends CI_Controller
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
    
    public function AllInstruments()
    {
        $this->load->model('Instruments/Instrument_model');
        $data = array();
        $data['data'] = $this->Instrument_model->getAllInstruments();
        $this->load->view('Instruments/all_instruments', $data);
        $this->load->view('General/footer');
    }
    
    public function Instruments($instrument_code)
    {
        $this->load->model('Musician/Musician_model');
        $data = array();
        $data['data'] = $this->Musician_model->getMusiciansByInstrument($instrument_code);
        $this->load->view('Instruments/instruments', $data);
        $this->load->view('General/footer');
    }
}

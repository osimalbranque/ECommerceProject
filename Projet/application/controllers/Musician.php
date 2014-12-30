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
    }
    
    public function composers($initial)
    {
        $this->load->model('Musician_model');
        $data = $this->Musician_model->getComposersNameBeginningBy($initial);
        
        
    }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sample
 *
 * @author osi
 */
class Sample extends CI_Controller
{
   public function __construct()
   {
       parent::__construct();
   }
   
   public function index($code)
   {
       $this->load->model('Media/Sample_model');
       $data['lob'] = $this->Sample_model->getMusicianSample($code);
       
       $this->load->view('Media/sample.php', $data);
   }
}

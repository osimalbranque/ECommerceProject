<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author osi
 */
class Image extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function Musician($code)
    {
        $this->load->model('Media/Image_model');
        $data['lob'] = $this->Image_model->getMusicianImage($code);
       // echo $data['lob'];
       $this->load->view('Media/image.php', $data);
    }
    
    public function Album($code)
    {
        $this->load->model('Media/Image_model');
        $data['lob'] = $this->Image_model->getAlbumImage($code);
        $this->load->view('Media/image.php', $data);
    }
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function css_url($name)
{
    return base_url() . 'application/assets/css/' . $name . '.css';
}

function js_url($name)
{
	return base_url() . 'application/assets/javascript/' . $name. '.js';
}

function img_url($name)
{
    return base_url() . 'application/assets/images/' . $name;
}

?>
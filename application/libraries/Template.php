<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @Class Template View
 */
class Template
{
	
	public function renderView($view,$data=array()){

		$CI =  &get_instance();

		$CI->load->view('template/header', $data);

		if(!empty($data) && $data['menu'] == TRUE){

			$CI->load->view('template/menu');
		}

		$CI->load->view($view,$data);

		$CI->load->view('template/scripts', $data);

	} 
}
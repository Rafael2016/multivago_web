<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacao
{

	/**
	 *@method Controle de acesso 
	 */
	public function isLogado(){

		$CI  = &get_instance();

		$logado = $CI->session->userdata('logado');


		if(empty($logado)){

			redirect(base_url().'login');
		}


	}
}
	
	

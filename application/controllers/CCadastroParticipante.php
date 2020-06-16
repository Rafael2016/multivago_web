<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCadastroParticipante extends CI_Controller
{


	/**
	 * @method Construtor
	 */ 
	public function __construct()
	{
		parent:: __construct();
		$this->autenticacao->isLogado();
	
	}

	/**
	 *@method Load Controller  
	 */
	public function index(){

		$this->template->renderView('vCadastroTrip',array('js'=>'cadastroTrip.js','css'=>'cadastroTrip.css','menu'=>TRUE));

	}



}
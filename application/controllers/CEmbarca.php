<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CEmbarca extends CI_Controller{


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

		$this->template->renderView('vEmbarca',array('js'=>'embarca.js','css'=>'embarca.css','menu'=>TRUE));

	}





}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CHome extends CI_Controller{


	/**
	 * @method Construtor 
	 */
	public function __construct(){

		parent:: __construct();
		$this->autenticacao->isLogado();
		

	}

	/**
	 * @method Load Controller
	 */
	public function index(){

		$this->template->renderView('vHome', array('js'=>'home.js','css'=>'home.css','menu'=>TRUE));
	}


}
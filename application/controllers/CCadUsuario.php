<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCadUsuario extends CI_Controller
{
	/**
	 * @method Construtor
	 */ 
	function __construct()
	{
		parent:: __construct();

	
	}

	/**
	 *@method Load Controller  
	 */
	public function index(){

		$this->template->renderView('vCadUsuario',array('js'=>'cadUsuario.js','css'=>'cadUsuario.css','menu'=>TRUE));

	}

	/**
	 *@method Criar Usuário  
	 */
	public function criar(){


		$this->load->library('form_validation');
		$this->load->model('MUsuario', 'model');

		try {
			
		} catch (Exception $e) {
			
		}
		if($this->input->post()){

			$this->form_validation->set_rules('nome','nome','required');
			$this->form_validation->set_rules('login','login','required');
			$this->form_validation->set_rules('senha','senha','required');
			$this->form_validation->set_rules('senha','senha','required');
			
			if(!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)){

				die(json_encode(array('sucess'=>FALSE,'message'=>'Necessário informa e-mail valido', 'data'=>NULL, 'type'=>'warning')));

			}

			if($this->form_validation->run() == FALSE){

				die(json_encode(array('sucess'=>FALSE,'message'=>'Necessário Preencher Todos Campos do Formulário', 'data'=>NULL, 'type'=>'warning')));

			}

			$data = array(
					'nome'=>   $this->input->post('nome'),
		        	'login'=>  $this->input->post('login'),
		        	'senha'=>  password_hash($this->input->post('senha'), PASSWORD_ARGON2I),
		        	'email'=>  $this->input->post('email'),
					'status'=> 1,
					'dtRegistro'=> date('Y-m-d H:i:s')
		    );


			$result = $this->model->criar($data);

			die(json_encode(array('sucess'=>TRUE,'message'=>'Usuário cadastro com sucesso', 'data'=>$result, 'type'=> 'success')));

			
		}

	}

}
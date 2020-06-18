<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {


	/**
	 * @method Construtor 
	 */
	public function __construct(){

		parent:: __construct();

	}


	/**
	 * @method Load Controller
	 */
	public function index(){

		$this->template->renderView('vLogin', array('js'=>'login.js','css'=>'login.css','menu'=> FALSE));
	}

	/**
	 * @method Autenticação no Sistema
	 * @parm Login e Senha
	 */
	public function logar(){

		$this->load->library('form_validation');
		$this->load->model('MUsuario', 'model');


		if($this->input->post()){

			$this->form_validation->set_rules('login','login','required');
			$this->form_validation->set_rules('senha','senha','required');

			if($this->form_validation->run() == FALSE){

				die(json_encode(array('sucess'=>FALSE,'message'=>'Necessário informa login e senha', 'data'=>NULL, 'type'=>'warning')));
			}

			$result = $this->model->buscarUser(trim($this->input->post('login')));
			
			if(!empty($result->login)){

				$flag = password_verify($this->input->post('senha'), $result->senha);
				
				if($flag){

					$sessao = array(
						'codUsuario' => $result->codUsuario,
						'usuario'=> $result->nome,
						'login'=> $result->login,
						'logado' => TRUE
					);
					
					$this->session->set_userdata($sessao);
					

					die(json_encode(array('sucess'=>TRUE,'message'=>NULL, 'data'=>NULL, 'type'=>NULL)));
				}

				die(json_encode(array('sucess'=>FALSE,'message'=>'Senha digitada errado', 'data'=>NULL, 'type'=>'warning')));
			}

			die(json_encode(array('sucess'=>FALSE,'message'=>'Login digitado errado', 'data'=>NULL, 'type'=>'warning')));
			
		}

		die(json_encode(array('sucess'=>FALSE,'message'=>'Error insperado ocorreu,contactar o Administrador', 'data'=>NULL, 'type'=>'error')));

	}

	/**
	 * @method Logoff
	 */
	public function logoff(){

		$this->session->sess_destroy();		
		redirect(base_url().'login');
	}


}

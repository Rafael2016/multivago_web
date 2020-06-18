<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CViajador extends CI_Controller
{


	/**
	 * @method Construtor
	 */ 
	public function __construct()
	{
		parent:: __construct();
		$this->autenticacao->isLogado();
		$this->load->model('MViajador', 'model');
		$this->load->helper('util');
	}

	/**
	 *@method Carregamento Página
	 */
	public function index(){

		$this->template->renderView('vViajador',array('js'=>'viajador.js','css'=>'viajador.css','menu'=>TRUE));

	}

	/**
	 *@method LOAD
	 */
	public function load(){

		$result = $this->model->load();
		response(array('success' =>TRUE ,'message'=> NULL, 'data'=>$result, 'type'=>'success'));	
	}

	/**
	 *@method BUSCAR REGISTRO
	 */
	public function get(){

		$result = $this->model->get($this->input->post('codViajador'));
		response(array('success' =>TRUE ,'message'=> NULL, 'data'=>$result, 'type'=>'success'));
		
	}

	/**
	 *@method ADD VIAJADOR
	 */
	public function add(){

		$this->load->library('form_validation');

		if($this->input->post()){

			$this->form_validation->set_rules('viajador','viajador','required');
			$this->form_validation->set_rules('di','di','required');
			$this->form_validation->set_rules('telefone','telefone','required');
			
			if($this->form_validation->run() === FALSE ){

				response(array('success' =>FALSE ,'message'=>'Necessário informa nome,RG e telefone', 'data'=>NULL, 'type'=>'warning'));
			}

			$data = array(

				'codViajador'  => !empty($this->input->post('codViajador')) ? $this->input->post('codViajador'):'',
				'viajador'     => $this->input->post('viajador'),
				'di'           => $this->input->post('di'),
				'telefone'     => $this->input->post('telefone'),
				'email'        => $this->input->post('email'),
				'userRegistro' => $this->session->userdata('codUsuario'),	
				'dtRegistro'  =>  date('Y-m-d H:i:s')
			);

			//ADD
			if(empty($data['codViajador'])){

				$result = $this->model->add($data);
		    //EDIT
			}else{

				$result = $this->model->edit($data);
			}

			if(!$result){

				response(array('success' =>FALSE ,'message'=>'Houve Erro no Sistema,procurar Administrador', 'data'=>NULL, 'type'=>NULL));			
			}


			response(array('success' =>TRUE ,'message'=>'Registro salvo com sucesso', 'data'=>$result, 'type'=>'success'));	

		}

		response(array('success' =>FALSE ,'message'=>'Houve Erro no Sistema,procurar Administrador', 'data'=>NULL, 'type'=>NULL));			
	}

	/**
	 *@method Cadastro Excluir
	 */
	public function delete(){

		$result = $this->model->delete($this->input->post('codViajador'));
		
		if(!$result){

			response(array('success' =>FALSE ,'message'=>'Houve Erro no Sistema,procurar Administrador', 'data'=>NULL, 'type'=>NULL));	

		}

		response(array('success' =>TRUE ,'message'=> 'Registro excluído com sucesso', 'data'=>$result, 'type'=>'success'));

	}


}
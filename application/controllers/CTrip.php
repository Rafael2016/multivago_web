<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTrip extends CI_Controller
{


	/**
	 * @method Construtor
	 */ 
	public function __construct()
	{
		parent:: __construct();

		$this->autenticacao->isLogado();
		$this->load->model('MTrip', 'model');
		$this->load->helper('util');

	}

	/**
	 *@method Load Controller  
	 */
	public function index(){

		$this->template->renderView('vTrip',array('js'=>'trip.js','css'=>'trip.css','menu'=>TRUE));

	}

	/**
	 *@method Carregamento  Página
	 */
	public function load(){

		$result = $this->model->load();
		response(array('success' =>TRUE ,'message'=> NULL, 'data'=>$result, 'type'=>'success'));

	}

	/**
	 *@method Cadastro buscar
	 */
	public function get(){

		$result = $this->model->get($this->input->post('codTrip'));
		response(array('success' =>TRUE ,'message'=> NULL, 'data'=>$result, 'type'=>'success'));

	}	

	/**
	 *@method Cadastro Trip
	 */
	public function add(){

		
		$this->load->library('form_validation');

		if($this->input->post()){

			$this->form_validation->set_rules('cidade','cidade','required');
			$this->form_validation->set_rules('uf','uf','required');
			$this->form_validation->set_rules('saida','saida','required');
			$this->form_validation->set_rules('retorno','retorno','required');
			$this->form_validation->set_rules('viajantes','viajantes','required');
			$this->form_validation->set_rules('hospedagem','hospedagem','required');
			$this->form_validation->set_rules('logistica','logistica','required');

			
			if($this->form_validation->run() == FALSE){

				response(array('success' =>FALSE ,'message'=> 'Necessário preencher os campos', 'data'=>NULL, 'type'=>'warning'));	
			}

			
			$data = array(

				'codTrip'=>		      !empty($this->input->post('codTrip')) ?	$this->input->post('codTrip'):'',
				'codUsuario'=> 		  $this->session->userdata('codUsuario'),
				'uf'=>  			  $this->input->post('uf'),
				'cidade'=> 			  $this->input->post('cidade'),  
				'descricao'=>		  $this->input->post('descricao'),
				'saida'=>  			  $this->input->post('saida'),
				'retorno'=>  		  $this->input->post('retorno'),   
				'viajantes'=>         $this->input->post('viajantes'),   
				'vlrHospedagem'=>  	  floatval(preg_replace("/[^-0-9\.]/","",convertDecimal($this->input->post('hospedagem')))),
				'vlrLogistica'=>  	  floatval(preg_replace("/[^-0-9\.]/","",convertDecimal($this->input->post('logistica')))),   
				'dtRegistro'=> 		  date('Y-m-d H:i:s')
			);

			//ADD
			if(empty($data['codTrip'])){

				$result = $this->model->add($data);
		    //EDIT
			}else{

				$result = $this->model->edit($data);
			}


			if(!$result){

				response(array('success' =>FALSE ,'message'=> 'Não foi possível salvar registro', 'data'=>$result, 'type'=>'warning'));

			}


			response(array('success' =>TRUE ,'message'=> 'Trip salva com sucesso', 'data'=>$result, 'type'=>'success'));
		}

		response(array('success' =>FALSE ,'message'=> 'Não foi possível salvar registro', 'data'=>$result, 'type'=>'warning'));
	}

	/**
	 *@method Cadastro Excluir
	 */
	public function delete(){

		$result = $this->model->delete($this->input->post('codTrip'));
		
		if(!$result){

			response(array('success' =>FALSE ,'message'=>'Erro ao excluir registro', 'data'=>NULL, 'type'=>NULL));	
		}

		response(array('success' =>TRUE ,'message'=> 'Registro excluído com sucesso', 'data'=>NULL , 'type'=>'success'));

	}



}
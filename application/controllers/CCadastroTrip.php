<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCadastroTrip extends CI_Controller
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

	/**
	 *@method Carregamento Página
	 */
	public function load(){

		$this->load->model('MTrip', 'model');

		$result = $this->model->load();

		die(json_encode(array('sucess'=>TRUE,'message'=> NULL, 'data'=>$result, 'type'=> 'success')));


	}	

	/**
	 *@method Cadastro Trip
	 */
	public function salvar(){

		
		$this->load->library('form_validation');
		$this->load->helper('Util');
		$this->load->model('MTrip', 'model');

				
		if($this->input->post()){

			$this->form_validation->set_rules('cidade','cidade','required');
			$this->form_validation->set_rules('uf','uf','required');
			$this->form_validation->set_rules('saida','saida','required');
			$this->form_validation->set_rules('retorno','retorno','required');
			$this->form_validation->set_rules('numParcipante','numParcipante','required');
			$this->form_validation->set_rules('hospedagem','hospedagem','required');
			$this->form_validation->set_rules('logistica','logistica','required');

			
			if($this->form_validation->run() == FALSE){

				die(json_encode(array('sucess'=>FALSE,'message'=>'Necessário Preencher Todos Campos do Formulário', 'data'=>NULL, 'type'=>'warning')));

			}

			//CONVERT FLOAT 	
			$hospedagem = floatval(preg_replace("/[^-0-9\.]/","",convertDecimal($this->input->post('hospedagem'))));
			$logistica  = floatval(preg_replace("/[^-0-9\.]/","",convertDecimal($this->input->post('logistica'))));
			
			$data = array(

				'codUsuario'=> 		  $this->session->userdata('codUsuario'),
				'uf'=>  			  $this->input->post('uf'),
				'cidade'=> 			  $this->input->post('cidade'),  
				'descricao'=>		  $this->input->post('descricao'),
				'saida'=>  			  $this->input->post('saida'),
				'retorno'=>  		  $this->input->post('retorno'),   
				'numParticipantes'=>  $this->input->post('numParcipante'),   
				'vlrHospedagem'=>  	  $hospedagem,   
				'vlrLogistica'=>  	  $logistica,   
				'dtRegistro'=> 		  date('Y-m-d H:i:s')
			);

				
			$result = $this->model->salvar($data);

			if(!$result){

				die(json_encode(array('sucess'=>FALSE,'message'=>'Erro ao Salvar Registro', 'data'=>NULL, 'type'=>'warning')));
			
			}


			die(json_encode(array('sucess'=>TRUE,'message'=>'Trip(Viagem) cadastrada com sucesso', 'data'=>$result, 'type'=> 'success')));
		}

		die(json_encode(array('sucess'=>FALSE,'message'=>'Não foi possível realizar Cadastrar Trip', 'data'=>NULL, 'type'=>'warning')));
	}



}
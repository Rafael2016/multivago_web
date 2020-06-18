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
		$this->load->model('MEmbarca', 'model');
		$this->load->model('MTrip');
		$this->load->model('MViajador');
		$this->load->helper('util');

	}

	/**
	 *@method Load Controller  
	 */
	public function index(){

		$this->template->renderView('vEmbarca',array('js'=>'embarca.js','css'=>'embarca.css','menu'=>TRUE));

	}

	/**
	 *@method LOAD
	 */
	public function load(){

		$embarcados = $this->model->load();
		$viajantes  = $this->MViajador->load();
		$trips      = $this->MTrip->load();

		$result    = array('viajantes'=>$viajantes,'trips'=>$trips, 'embarcados'=> $embarcados);

		response(array('success' =>TRUE ,'message'=> NULL, 'data'=>$result, 'type'=>'success'));	
	}	

	/**
	 *@method ADD 
	 */
	public function add(){

		$this->load->library('form_validation');

		if($this->input->post()){

			$this->form_validation->set_rules('viajador','viajador','required');
			$this->form_validation->set_rules('trip','trip','required');
			
			if($this->form_validation->run() === FALSE ){

				response(array('success' =>FALSE ,'message'=>'Necessário informa o viajador e a trip', 'data'=>NULL, 'type'=>'warning'));
			}


			$data = array(

				'codEmbarcado'  => !empty($this->input->post('codEmbarcado')) ? $this->input->post('codEmbarcado'):'',
				'codViajador'   => $this->input->post('viajador'),
				'codTrip'       => $this->input->post('trip'),
				'pagamento'     => $this->input->post('pagamento'),
				'frmPtgo'       => $this->input->post('frmPtgo'),
				'dtRegistro'    =>  date('Y-m-d H:i:s')
			);

			//ADD
			if(empty($data['codEmbarcado'])){

				$result = $this->model->add($data);
		    //EDIT
			}else{

				$result = $this->model->edit($data);
			}

			if(!$result){

				response(array('success' =>FALSE ,'message'=>'Houve Erro no Sistema,procurar Administrador', 'data'=>NULL, 'type'=>NULL));			
			}


			response(array('success' =>TRUE,'message'=>'Viajador Embarcado com sucesso <i class="fas fa-hiking"></i>
			', 'data'=>$result, 'type'=>'success'));	

		}

		response(array('success' =>FALSE ,'message'=>'Houve Erro no Sistema,procurar Administrador', 'data'=>NULL, 'type'=>NULL));			
	}

	/**
	 *@method BUSCAR REGISTRO
	 */
	public function get(){

		$result = $this->model->get($this->input->post('codEmbarcado'));
		response(array('success' =>TRUE ,'message'=> NULL, 'data'=>$result, 'type'=>'success'));
		
	}

	/**
	 *@method Cadastro Excluir
	 */
	public function delete(){

		$result = $this->model->delete($this->input->post('codEmbarcado'));
		
		if(!$result){

			response(array('success' =>FALSE ,'message'=>'Houve Erro no Sistema,procurar Administrador', 'data'=>NULL, 'type'=>NULL));	

		}

		response(array('success' =>TRUE ,'message'=> 'Viajador Desembarcado com sucesso <i class="fas fa-hiking"></i>', 'data'=>$result, 'type'=>'success'));

	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MEmbarca extends CI_Model
{


	/**
	 *@Load DAO 
	 */
	public function load(){


		$this->db->select('tbl_embarcado.codEmbarcado,tbl_viajador.viajador,tbl_viajador.di,tbl_viajador.telefone,tbl_trip.cidade,tbl_trip.saida ,tbl_trip.retorno,tbl_embarcado.pagamento,tbl_embarcado.frmPtgo');
		$this->db->from('tbl_embarcado');
		$this->db->join('tbl_viajador','tbl_viajador.codViajador = tbl_embarcado.codViajador');
		$this->db->join('tbl_trip','tbl_trip.codTrip = tbl_embarcado.codTrip');

		if($this->session->userdata('login') != 'admin'){

			$this->db->where('codUsuario',($this->session->userdata('codUsuario')));
		}

		return $this->db->get()->result();
	}

	/**
	 *@Buscar DAO 
	 */
	public function get($codEmbarcado){

		$this->db->select('tbl_embarcado.codTrip,tbl_embarcado.codViajador,tbl_embarcado.codEmbarcado,tbl_viajador.viajador,tbl_viajador.di,tbl_viajador.telefone,tbl_trip.cidade,tbl_trip.saida ,tbl_trip.retorno,tbl_embarcado.pagamento,tbl_embarcado.frmPtgo');
		$this->db->from('tbl_embarcado');
		$this->db->join('tbl_viajador','tbl_viajador.codViajador = tbl_embarcado.codViajador');
		$this->db->join('tbl_trip','tbl_trip.codTrip = tbl_embarcado.codTrip');
		$this->db->where('codEmbarcado',$codEmbarcado);

		return $this->db->get()->result();
		
	}


	/**
	 *@method Adicionar DAO 
	 */
	public function add($data){

		return $this->db->insert('tbl_embarcado', $data);
	}

	/**
	 *@method Editar DAO 
	 */
	public function edit($data){

		$this->db->where('codEmbarcado',$data['codEmbarcado']);

		return $this->db->update('tbl_embarcado',$data);
	}


	/**
	 *@Excluir DAO 
	 */
	public function delete($codEmbarcado){

		$this->db->where('codEmbarcado',$codEmbarcado);
		return $this->db->delete('tbl_embarcado');
		
	}


}
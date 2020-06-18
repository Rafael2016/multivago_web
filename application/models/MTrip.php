<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MTrip extends CI_Model
{

	
	/**
	 *@Load DAO 
	 */
	public function load(){

		$this->db->select('tbl_trip.codTrip,tbl_trip.descricao,tbl_trip.uf,tbl_trip.cidade,tbl_trip.saida,tbl_trip.retorno,
			tbl_trip.viajantes,tbl_trip.vlrHospedagem,tbl_trip.vlrLogistica,tbl_usuario.nome');
		$this->db->from('tbl_trip');
		$this->db->join('tbl_usuario','tbl_trip.codUsuario = tbl_usuario.codUsuario');
		
		if($this->session->userdata('codUsuario') > 1){

			$this->db->where('tbl_trip.codUsuario',$this->session->userdata('codUsuario'));
		}

		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * @method GET TRIP 
	 */
	public function get($codTrip){

		$this->db->select('tbl_trip.codTrip,tbl_trip.descricao,tbl_trip.uf,tbl_trip.cidade,tbl_trip.saida,tbl_trip.retorno,
			tbl_trip.viajantes,tbl_trip.vlrHospedagem,tbl_trip.vlrLogistica,tbl_usuario.nome');
		$this->db->from('tbl_trip');
		$this->db->join('tbl_usuario','tbl_trip.codUsuario = tbl_usuario.codUsuario');
		$this->db->where('tbl_trip.codTrip',$codTrip);

		if($this->session->userdata('login') == 'admin'){

			$this->db->where('tbl_trip.codUsuario',($this->session->userdata('codUsuario')));
		}

		return $this->db->get()->result();

	}


	/**
	 *@method ADD DAO 
	 */
	public function add($data){

		return $this->db->insert('tbl_trip', $data);
	}

	/**
	 *@method EDIT DAO 
	 */
	public function edit($data){

		$this->db->where('codTrip',$data['codTrip']);

		return $this->db->update('tbl_trip',$data);
	}

	/**
	 *@Excluir DAO 
	 */
	public function delete($codTrip){

		$this->db->where('codTrip',$codTrip);
		return $this->db->delete('tbl_trip');
		
	}

	

}
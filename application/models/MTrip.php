<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MTrip extends CI_Model
{

	
	/**
	 *@Salvar DAO 
	 */
	public function load(){
	
		$this->db->select('tbl_trip.codViagem,tbl_trip.uf,tbl_trip.cidade,tbl_trip.saida,tbl_trip.retorno,
			tbl_trip.numParticipantes,tbl_trip.vlrHospedagem,tbl_trip.vlrLogistica,tbl_usuario.nome');
		$this->db->from('tbl_trip');
		$this->db->join('tbl_usuario','tbl_trip.codUsuario = tbl_usuario.codUsuario');
		
		if($this->session->userdata('codUsuario') > 1){

			$this->db->where('tbl_trip.codUsuario',$this->session->userdata('codUsuario'));
		}

		$query = $this->db->get();
		return $query->result();
	}


	/**
	 *@Salvar DAO 
	 */
	public function salvar($data){

		
		return $this->db->insert('tbl_trip', $data);

	}








}
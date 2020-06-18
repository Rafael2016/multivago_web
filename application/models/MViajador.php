<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MViajador extends CI_Model
{

	/**
	 *@Load DAO 
	 */
	public function load(){


		$this->db->select(' codViajador,viajador,di,telefone,email');
		$this->db->from('tbl_viajador');
		
		if($this->session->userdata('login') != 'admin'){

			$this->db->where('codUsuario',($this->session->userdata('codUsuario')));
		}

		return $this->db->get()->result();
	}

	/**
	 *@Buscar DAO 
	 */
	public function get($codViajador){

		$this->db->select('codViajador,viajador,di,telefone,email');
		$this->db->from('tbl_viajador');
		$this->db->where('codViajador',$codViajador);

		return $this->db->get()->result();
		
	}

	/**
	 *@method Adicionar DAO 
	 */
	public function add($data){

		return $this->db->insert('tbl_viajador', $data);
	}

	/**
	 *@method Editar DAO 
	 */
	public function edit($data){

		$this->db->where('codViajador',$data['codViajador']);

		return $this->db->update('tbl_viajador',$data);
	}

	/**
	 *@Excluir DAO 
	 */
	public function delete($codViajador){
		
		$this->db->where('codViajador',$codViajador);
		return $this->db->delete('tbl_viajador');

	}

}
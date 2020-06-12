<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MUsuario extends CI_Model
{
	

	/**
	 * @method DAO CREATE USUÁRIO 
	 */
	public function criar($usuario){

		$this->db->db_debug = false;

		if(!$this->db->insert('tbl_usuario', $usuario)){

			$error =$this->db->error();

			if($error['code'] == 1062){

				die(json_encode(array('sucess'=>FALSE,'message'=>'Login já esta sendo usado', 'data'=>NULL, 'type'=>'warning')));
			}
		}

		$this->db->db_debug = true;
		return TRUE;

	}

	/**
	 * @method DAO BUSCAR USUÁRIO 
	 */	
	public function buscarUser($login){

		$this->db->select('*');
		$this->db->from('tbl_usuario');
		$this->db->where('login', $login);

		$query = $this->db->get();

		return $query->row();

	}

}	
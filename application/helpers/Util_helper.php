<?php
defined('BASEPATH') or exit('No direct script access allowed');



	/**
 	 *  @method Response retorno Ajax
 	 */
 	function response($data=array()){

 			die(json_encode(array('success'=>$data['success'],'message'=> $data['message'], 'data'=>$data['data'], 
 				'type'=> $data['type'])));
 	}


 	/**
 	 *  @method Convert String para Decimal
 	 */
 	function convertDecimal($string){

 		unset($aux);
 		$aux      = substr($string, 3);
 		$aux      = str_replace(',', '.', str_replace('.', '', $aux));
 	  
 		return $aux;
 	}


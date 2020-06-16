<?php
defined('BASEPATH') or exit('No direct script access allowed');


 	/**
 	 *  @method Convert String para Decimal
 	 */
 	function convertDecimal($string){

 		unset($aux);
 		$aux      = substr($string, 3);
 		$aux      = str_replace(',', '.', str_replace('.', '', $aux));
 	  
 		return $aux;
 	}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ARQUIVOS DE ROTAS 
 */

## URL AMIGÁVEL                ##CONTROLLLER
$route['default_controller'] 	= 'CLogin';
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;
$route['home']                 = 'CHome'; 

//LOGIN
$route['login']                = 'CLogin';
$route['logar']				   = 'CLogin/logar';
$route['logoff']			   = 'CLogin/logoff';
//USUÁRIOS
$route['cadUsuario']           = 'CCadUsuario';
$route['cadUsuario/criar']     = 'CCadUsuario/criar';
//TRIP
$route['trip']                 		= 'CTrip';
$route['trip/load']             	= 'CTrip/load';
$route['trip/get']       			= 'CTrip/get';
$route['trip/add']       			= 'CTrip/add';
$route['trip/delete']      			= 'CTrip/delete';
//VIAJADOR
$route['viajador']			      	= 'CViajador';
$route['viajador/add']  	  	  	= 'CViajador/add'; 
$route['viajador/load']  			= 'CViajador/load';
$route['viajador/get']   	        = 'CViajador/get';
$route['viajador/delete']   	    = 'CViajador/delete';  
//EMBARCA
$route['embarca']			      	= 'CEmbarca';
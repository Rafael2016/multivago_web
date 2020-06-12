<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ARQUIVOS DE ROTAS 
 */

## URL AMIGÁVEL                ##CONTROLLLER
$route['default_controller'] 	= 'CLogin';
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;

$route['login']                = 'CLogin';
$route['logar']				   = 'CLogin/logar';	
$route['cadUsuario']           = 'CCadUsuario';
$route['cadUsuario/criar']     = 'CCadUsuario/criar';

$route['home']                 = 'CHome'; 


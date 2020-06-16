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
$route['logoff']			   = 'CLogin/logoff';

$route['cadUsuario']           = 'CCadUsuario';
$route['cadUsuario/criar']     = 'CCadUsuario/criar';

$route['cadTrip']              = 'CCadastroTrip';
$route['load']                 = 'CCadastroTrip/load';
$route['cadTrip/salvar']       = 'CCadastroTrip/salvar';

$route['cadParticipante']      = 'CCadastroParticipante'; 

$route['home']                 = 'CHome'; 


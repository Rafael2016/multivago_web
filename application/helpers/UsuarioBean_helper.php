<?php
 defined('BASEPATH') or exit('No direct script access allowed');

 /**
  * @Classe Entities Usuário 
  */
 class UsuarioBean 
 {

 	private $nome;
 	private $login;
 	private $senha;
 	private $email;
 	private $status;

 	public function setNome($nome){

 		$this->nome = $nome;
 	} 

 	public function getNome(){

 		return $this->nome;
 	}

 	public function setLogin($login){

 		$this->login = $login;
 	} 

 	public function getLogin(){

 		return $this->login;
 	}

 	public function setSenha($senha){

 		$this->senha = md5($senha);
 	} 

 	public function getSenha(){

 		return $this->senha;
 	}

 	public function setEmail($email){

 		$this->email = $email;
 	} 

 	public function getEmail(){

 		return $this->email;
 	}

 	public function setStatus($status){

 		$this->status = $status;
 	} 

 	public function getStatus(){

 		return $this->status;
 	}
 	
 	
 }
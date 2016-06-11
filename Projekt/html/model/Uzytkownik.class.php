<?php

class Uzytkownik {
	
	private $email;
        private $id;
	private $login;
        private $password;
	private $role = array();
        
        public function __construct(){   
        }
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
        public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
        
	public function getLogin(){
		return $this->login;
	}
	public function setLogin($login){
		$this->login = $login;
	}      
        public function getHaslo(){
		return $this->password;
	}
	public function setHaslo($password){
		$this->password = $password;
	}
	public function getRole(){
		return $this->role;
	}
	public function setRole($role){
		$this->role = $role;
	}	
}
?>
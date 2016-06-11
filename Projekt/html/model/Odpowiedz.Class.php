<?php

class Odpowiedz {
	
	private $odpID;
        private $answer;
	private $sel;
        private $qID;

        
        public function __construct(){   
        }
	public function getOdpID(){
		return $this->odpID;
	}
	public function setOdpID($odpID){

               $this->odpID = $odpID;
	}
        public function getOdp(){
		return $this->answer;
	}
	public function setOdp($answer){
		$this->answer = $answer;
	}
	public function getOdp_sel(){
		return $this->sel;
	}
	public function setOdp_sel($sel){
		$this->sel = $sel;
	}
        public function getOdp_qID(){
		return $this->qID;
	}
	public function setOdp_qID($qID){
		$this->qID = $qID;
	}
}
?>
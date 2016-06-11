<?php

class Pytanie {
	
	private $pytID;
        private $q;
	private $q_ans_number;
        private $q_ans_type;
        private $formID;

        
        public function __construct(){   
        }
	public function getPytID(){
		return $this->pytID;
	}
	public function setPytID($pytID){

               $this->pytID = $pytID;
	}
        public function getPyt_q(){
		return $this->q;
	}
	public function setPyt_q($question){
		$this->q = $question;
	}
	public function getPyt_q_ans_number(){
		return $this->q_ans_number;
	}
	public function setPyt_q_ans_number($q_ans_number){
		$this->q_ans_number = $q_ans_number;
	}
        public function getPyt_q_ans_type(){
		return $this->q_ans_type;
	}
	public function setPyt_q_ans_type($q_ans_type){
		$this->q_ans_type = $q_ans_type;
	}
        public function getPyt_FormID(){
		return $this->formID;
	}
	public function setPyt_FormID($formID){
		$this->formID = $formID;
	}
}
?>
<?php

class Formularz {
	
	private $formName;
	private $qNum;
        private $formID;
        private $question;
	private $q_ans_number;
        private $q_ans_type;
        private $answer;
        private $user;

        
        public function __construct(){   
        }
	public function getFormName(){
		return $this->formName;
	}
	public function setFormName($formName){

               $this->formName = $formName;
	}
	public function getFormQNum(){
		return $this->qNum;
	}
	public function setFormQNum($qNum){
		$this->qNum = $qNum;
	}      
        public function getForm_question(){
		return $this->question;
	}
	public function setForm_question($question){
		$this->question = $question;
	}
	public function getForm_q_ans_number(){
		return $this->q_ans_number;
	}
	public function setForm_q_ans_number($q_ans_number){
		$this->q_ans_number = $q_ans_number;
	}
        public function getForm_q_ans_type(){
		return $this->q_ans_type;
	}
	public function setForm_q_ans_type($q_ans_type){
		$this->q_ans_type = $q_ans_type;
	}
        public function getForm_answer(){
		return $this->answer;
	}
	public function setForm_answer($answer){
		$this->answer = $answer;
	} 
        
        public function getFormUser(){
		return $this->user;
	}
	public function setFormUser($user){
		$this->user = $user;
	}
        public function getFormId(){
		return $this->formID;
	}
	public function setFormID($formID){
		$this->formID = $formID;
	}
}
?>
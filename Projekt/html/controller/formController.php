<?php

class formController extends baseController {

    public function index() {
        
    }

    public function show() {
        $this->registry->template->show('/form/form_show');
             
    }

   
    public function add() {
        if (empty($_POST['form_success'])) {
            $this->registry->template->show('/form/form_new');
        } else {
            $this->registry->template->show('/form/form_add_success');
        }
    }

    public function add_save() {
        $db = $this->registry->db;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $formName = trim($_POST['form_title']);
            $q_num = trim($_POST['q_num']);
            $ankieta = new Formularz;
            $ankieta->setFormName($formName);
            $ankieta->setFormQNum($q_num);
            $login = $_SESSION['user'];
            $user = Database::GetUserByLogin($login);
            $id = $user->getId();
            $ankieta->setFormUser($id);
            $db::addForm($ankieta);

            for ($i = 1; $i <= $q_num; $i++) {
                $question = trim($_POST['q' . $i]);
                $q_ans_number = trim($_POST['q' . $i . '_ans_number']);
                $q_ans_type = trim($_POST['q' . $i . '_ans_type']);
                $ank = Database::getFormByName($formName);
                $id2 = $ank->getFormID();
                $pytanie = 'pyt' . $i;
                $pytanie = new Pytanie;
                $pytanie->setPyt_q($question);
                $pytanie->setPyt_q_ans_number($q_ans_number);
                $pytanie->setPyt_q_ans_type($q_ans_type);
                $pytanie->setPyt_FormID($id2);
                $db::addQuestion($pytanie);               
                for ($j = 0; $j < $q_ans_number; $j++) {
                    $a = 'q' . $i . '_ans' . ($j + 1);
                    $answer = trim($_POST[$a]);
                    $q = Database::getQuestionByQ($question);
                    $id3 = $q->getPytID();
                    $sel = 0;
                    $odp = 'odp' . $j;
                    $odp = new Odpowiedz;
                    $odp->setOdp($answer);
                    $odp->setOdp_sel($sel);
                    $odp->setOdp_qID($id3);
                    $db::addAnswer($odp); 
                }
            }
        }
        $this->registry->template->show('/form/form_add_done');
        $this->registry->template->show('index');
    }

    public function del() {
        $this->registry->template->show('/form/form_del');
    }

    public function result() {
        $this->registry->template->show('/form/form_result');
    }
    
    public function view() {
        
        $this->registry->template->show('/form/form_view');
    }
    

}

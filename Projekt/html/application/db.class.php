<?php

Class Database {

    private static $db;

    public static function getInstance() {
        if (!self::$db) {
            if(self::$db = new PDO('mysql:host=localhost;dbname=ankieta;charset=utf8', 'root', ''))
      
            return new Database();
        }
    }


    //użytkownicy
    //dodanie użytkownika
    public static function addUser($user) {
        $stmt = self::$db->prepare("INSERT INTO users(email,login,password) "
                . "VALUES(:email,:login,:password)");
        $stmt->execute(array(
            ':email' => $user->getEmail(), ':login' => $user->getLogin(), ':password' => sha1($user->getHaslo()))
        );
        $affected_rows = $stmt->rowCount();
        if ($affected_rows == 1) {
            return TRUE;
        }
        return FALSE;
    }
    //pobranie użytkownika po id
    public static function getUserByID($id) {
        $stmt = $db->prepare('SELECT * FROM users WHERE id=?');
        $stmt->execute(array($id));
        if ($stmt->rowCount > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $user = new Uzytkownik;
            $user->setId($result['id']);
            $user->setEmail($result['email']);
            $user->setLogin($result['login']);
            $user->setHaslo($result['password']);
            $role = self::userRoles($result['login']);
            $user->setRole($role);
            return $user;
        }
    }
    //pobranie użytkownika po loginie i haśle
    public static function getUserByLoginAndPassword($login, $password) {
        $stmt = self::$db->prepare('SELECT * FROM users WHERE login=? and password=?');
        $stmt->execute(array($login, sha1($password)));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $user = new Uzytkownik();
            $user->setId($result['idUsers']);
            $user->setEmail($result['email']);
            $user->setLogin($result['login']);
            $user->setHaslo($result['password']);
            $role = self::userRoles($result['login']);
            $user->setRole($role);
            return $user;
        }
    }
    //pobranie użytkownika o podanym loginie
    public static function getUserByLogin($login) {
        $stmt = self::$db->prepare('SELECT * FROM users WHERE login=?');
        $stmt->execute(array($login));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            
            $user = new Uzytkownik();
            $user->setId($result['idUsers']);
            $user->setEmail($result['email']);
            $user->setLogin($result['login']);
            $user->setHaslo($result['password']);
            $role = self::userRoles($result['login']);
            $user->setRole($role);
            return $user;
        }
    }
    //pobranie użytkownika o podanym mailu
    public static function getUserByEmail($email) {
        $stmt = self::$db->prepare('SELECT * FROM users WHERE email=?');
        $stmt->execute(array($email));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $user = new Uzytkownik();
            $user->setEmail($result['email']);
            $user->setLogin($result['login']);
            $user->setHaslo($result['password']);
            $role = self::userRoles($result['login']);
            $user->setRole($role);
            return $user;
        }
    }

    //role
    //sprawdzenie, czy użytkownik posiada określoną rolę
    public static function isUserInRole($login, $role) {
        $userRoles = self::userRoles($login);
        return in_array($role, $userRoles);
    }
    //pobranie wszystkich roli użytkownika
    public static function userRoles($login) {
        $stmt = self::$db->prepare("SELECT r.name FROM users u 	
		INNER JOIN role ur on(u.id = ur.user_id)
		INNER JOIN roles r on(ur.role_id = r.id)
		WHERE	u.login = ?");
        $stmt->execute(array($login));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $roles = array();
        for ($i = 0; $i < count($result); $i++) {
            $roles[] = $result[$i]['name'];
        }
        return $roles;
    }
    
    public static function addForm($Form){
        
        $stmt = self::$db->prepare("INSERT INTO form(form_name, q_num, active, done, Users_idUsers)  "
                . "VALUES (:formName, :qNum, :active, :done, :idUsers)");
      
        $stmt->execute(array(
            ':formName' => $Form -> getFormName(),
            ':qNum' => $Form ->getFormQNum(),
            ':active' => '1',
            ':done' => '0',
            ':idUsers' => $Form ->getFormUser(),
            
        ));

        $affected_rows = $stmt->rowCount();
        
        
        if ($affected_rows == 1) {
           return TRUE;
        }
        return FALSE;
        
        }
        
    public static function addQuestion($Pytanie){

        $stmt = self::$db->prepare("INSERT INTO questions(question, q_ans_number, q_ans_type, Form_idForm)  "
                . "VALUES (:question, :q_ans_number, :q_ans_type, :Form_idForm)");
        
        
        
        $stmt->execute(array(
            ':question' => $Pytanie ->getPyt_q(),
            ':q_ans_number' => $Pytanie ->getPyt_q_ans_number(),
            ':q_ans_type' => $Pytanie ->getPyt_q_ans_type(),
            ':Form_idForm' => $Pytanie ->getPyt_FormID(),
            
        ));

        $affected_rows = $stmt->rowCount();
        
        
        if ($affected_rows == 1) {
           return TRUE;
        }
        return FALSE;
        
    }
     
    public static function addAnswer($Odpowiedz){

        $stmt = self::$db->prepare("INSERT INTO answers(answer, selected, Questions_idQuestions)  "
                . "VALUES (:answer, :selected, :Questions_idQuestions)");
        
        
        
        $stmt->execute(array(
            ':answer' => $Odpowiedz ->getOdp(),
            ':selected' => $Odpowiedz ->getOdp_sel(),
            ':Questions_idQuestions' => $Odpowiedz ->getOdp_qID(),           
        ));

        $affected_rows = $stmt->rowCount();
        
        
        if ($affected_rows == 1) {
           return TRUE;
        }
        return FALSE;
        
    }
    
    public static function getFormByName($name) {
        $stmt = self::$db->prepare('SELECT * FROM form WHERE form_name=?');
        $stmt->execute(array($name));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            
            $ankieta = new Formularz();
            $ankieta->setFormID($result['idForm']);
            $ankieta->setFormName($result['form_name']);
            $ankieta->setFormQNum($result['q_num']);
            $ankieta->setFormUser($result['Users_idUsers']);
            
            return $ankieta;
        }
    }
        
        
     public static function getQuestionByQ($question) {
         
        $stmt = self::$db->prepare('SELECT * FROM questions WHERE question=?');
        $stmt->execute(array($question));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $idQuestion1 = $result['idQuestions'];
            $question1 = $result['question'];
            $q_ans_number1 = $result['q_ans_number'];
            $q_ans_type1 = $result['q_ans_type'];
            $q_form1 = $result['Form_idForm'];
            
            $q = new Pytanie();
            $q->setPytID($idQuestion1);
            $q->setPyt_q($question1);
            $q->setPyt_q_ans_number($q_ans_number1);
            $q->setPyt_q_ans_type($q_ans_type1);
            $q->setPyt_FormID($q_form1);

            
            return $q;
        }   
    }
        
     public static function ShowFormByUser($user) {
         
        $stmt = self::$db->prepare('SELECT * FROM form WHERE Users_idUsers=?');
        $stmt->execute(array($user));
        
        
      foreach($stmt as $row)
      {    
          include 'includes\table.php';
      }
   }
    
       public static function getQuestionByFormID($formID) {
         
        $stmt = self::$db->prepare('SELECT * FROM questions WHERE Form_idForm=?');
        $stmt->execute(array($formID));
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $results[0];
            $idQuestion1 = $result['idQuestions'];
            $question1 = $result['question'];
            $q_ans_number1 = $result['q_ans_number'];
            $q_ans_type1 = $result['q_ans_type'];
            $q_form1 = $result['Form_idForm'];
            
            $q = new Pytanie();
            $q->setPytID($idQuestion1);
            $q->setPyt_q($question1);
            $q->setPyt_q_ans_number($q_ans_number1);
            $q->setPyt_q_ans_type($q_ans_type1);
            $q->setPyt_FormID($q_form1);

            
            return $q;
        }   
    }
 
        
        
        
        
        
}
?>



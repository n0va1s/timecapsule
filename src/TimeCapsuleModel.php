<?php

require './TimeCapsuleDAO.php';

class TimeCapsuleModel {
    private $name;
    private $phone;
    private $email;
    private $date;
    private $message;
        
    function __construct() {
        
        $timeCapsuleDAO = new TimeCapsuleDAO();
    }
    
    public function setName($name) {
//TODO: Mover para uma classe Validator
//TODO: isRequired, isNumeric, isText, isPhone, isEmail, isValid, isDate
        if (!isset($name)) {
        
            echo "Informe o nome";
        } 
        
        if (len($name) < 5) {

            echo "O nome precisa ter ao menos 5 letras";
        }
        
        $this->name = upper($name);
    }
    
    public function setPhone($phone) {

        if (!isset($phone)) {
        
            echo "Informe o telefone";
        }
        
        if (len($phone) < 10) {

            echo "O telefone precisa ter ao menos 10 números";
        }
        
        $this->phone = strreplace($phone, "-", null);
    }
    
    public function setEmail($email) {

        if ($email == "") {
        
            echo "Informe o email";
        }
        
        if (instr($email, "@")) {

            echo "O email não é válido";
        }
        
        $this->email = upper($email);
    }
    
    public function setDate($date) {

        if ($date == "") {
        
            echo "Informe a data do envio";
        }
        
        if (len($date) < 10) {

            echo "A data precisa ter ao menos 8 números";
        }
        
        $this->date = strreplace($date, "/", null);
    }
    
    public function setMessage($message) {

        $this->message = isset($message) ? $message : "";
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getPhone(){
        return $this->phone;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function getDate(){
        return $this->date;
    }
    public function getMessage(){
        return $this->message;
    }

    public function gravar() {
        
        $this->timeCapsuleDAO->inserir($this);    
    }
    
    function __destruct() {
      
        $timeCapsuleDAO = NULL;
    }
}

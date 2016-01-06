<?php

require 'TimeCapsuleDAO.php';

class TimeCapsuleModel {
    private $name;
    private $phone;
    private $email;
    private $date;
    private $message;

    function __construct() {
        $this->timeCapsuleDAO = new TimeCapsuleDAO();
    }

    public function setName($name) {
//TODO: Mover para uma classe Validator
//TODO: isRequired, isNumeric, isText, isPhone, isEmail, isValid, isDate
        $this->name = $name;
    }

    public function setPhone($phone) {
        $this->phone = str_replace($phone, "-", null);
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDate($date) {
        $this->date = str_replace($date, "/", null);
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
        return true;
    }

    function __destruct() {
        $timeCapsuleDAO = NULL;
    }
}

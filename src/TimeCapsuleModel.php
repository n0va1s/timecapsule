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
        $this->name = utf8_encode($name);
    }

    public function setPhone($phone) {
        $this->phone = str_replace(str_replace(str_replace($phone, "-", ""),")",""),"(","");
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDate($date) {
        $dia = substr($date, 0,2);
        $mes = substr($date, 3,2);
        $ano = substr($date, 6,4);
        $date = date_create($ano."-".$mes."-".$dia);
        $this->date = date_format($date, 'Y-m-d');
    }

    public function setMessage($message) {
        $this->message = isset($message) ? utf8_encode($message) : "";
    }

    public function getName(){
        return utf8_decode($this->name);
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
        return utf8_decode($this->message);
    }

    public function gravar() {
        $this->timeCapsuleDAO->inserir($this);
        return true;
    }

    function __destruct() {
        $timeCapsuleDAO = NULL;
    }
}
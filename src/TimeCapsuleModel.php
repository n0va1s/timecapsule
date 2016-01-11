<?php

require 'TimeCapsuleDAO.php';

class TimeCapsuleModel {
    private $to;
    private $from;
    private $phone;
    private $email;
    private $date;
    private $message;

    function __construct() {
        $this->timeCapsuleDAO = new TimeCapsuleDAO();
    }

    public function setTo($to) {
//TODO: Mover para uma classe Validator
//TODO: isRequired, isNumeric, isText, isPhone, isEmail, isValid, isDate
        $this->to = utf8_encode($to);
    }

    public function setFrom($from) {
        $this->from = utf8_encode($from);
    }

    public function setPhone($phone) {
        $this->phone = str_replace("(","",str_replace(")","",str_replace("-","",$phone)));
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDate($date) {
        $dia = substr($date, 0,2);
        $mes = substr($date, 3,2);
        $ano = substr($date, 6,4);
        
        $this->date = date_format(date_create($ano."-".$mes."-".$dia),"Y-m-d");
    }

    public function setMessage($message) {
        $this->message = utf8_encode($message);
    }

    public function getTo(){
        return $this->to;
    }

    public function getFrom(){
        return $this->from;
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
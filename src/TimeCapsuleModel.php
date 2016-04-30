<?php

require 'TimeCapsuleDAO.php';

class TimeCapsuleModel {
    private $seq;
    private $to;
    private $from;
    private $phone;
    private $email;
    private $date;
    private $message;

    function __construct() {
        $this->timeCapsuleDAO = new TimeCapsuleDAO();
    }

    public function setSeq($seq) {
        $this->seq = $seq;
    }

    public function setTo($to) {
//TODO: Mover para uma classe Validator
//TODO: isRequired, isNumeric, isText, isPhone, isEmail, isValid, isDate
        $this->to = $to;
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    public function setPhone($phone) {
        $this->phone = str_replace("(","",str_replace(")","",str_replace("-","",$phone)));
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDate($date) {
       if(substr_count($date,"/") == 2){
         list($dia, $mes, $ano) = explode("/", $date);
         //$dia = substr($date, 0,2);
         //$mes = substr($date, 3,2);
         //$ano = substr($date, 6,4);
         $this->date = date_format(date_create($ano."-".$mes."-".$dia),"Y-m-d");
       } else {
         $this->date = NULL;
       }
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getSeq(){
        return $this->seq;
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
        if(!empty($this->getSeq())){
           $this->timeCapsuleDAO->alterar($this);
        } else {
           $this->timeCapsuleDAO->inserir($this);
        }
        return true;
    }

    public function consultar() {
        return $this->timeCapsuleDAO->listar();
    }

    function __destruct() {
        $timeCapsuleDAO = NULL;
    }
}

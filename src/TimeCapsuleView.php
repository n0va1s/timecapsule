<?php
/*
 * Copyright (c) 2015 Joao Paulo Cirino Silva de Novais <joaopaulonovais@gmail.com>
 *
 */
require './TimeCapsuleModel.php';

class TimeCapsuleView {

    private $timecapsule;

    public function __construct() {
echo 'a';
        $this->timecapsule = new TimeCapsuleModel();
echo 'b';        
        $this->timecapsule->setName(isset($_POST["name"]) ? $_POST["name"] : "");
        $this->timecapsule->setPhone(isset($_POST["phone"]) ? $_POST["phone"] : "");
        $this->timecapsule->setEmail(isset($_POST["email"]) ? $_POST["email"] : "");
        $this->timecapsule->setDate(isset($_POST["date"]) ? $_POST["date"] : "");
        $this->timecapsule->setMessage(isset($_POST["message"]) ? $_POST["message"] : "");
echo 'c';        
        $this->timecapsule->gravar($this->timecapsule);        
echo 'd';        
    }
    
    public function __destruct() {
echo 'e';
        $this->timecapsule = NULL;
    }
}

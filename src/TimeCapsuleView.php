<?php
/*
 * Copyright (c) 2015 Joao Paulo Cirino Silva de Novais <joaopaulonovais@gmail.com>
 *
 */

require 'TimeCapsuleModel';

class TimeCapsuleView {

    private $timecapsule;

    function __construct() {
        $this->timecapsule = new TimeCapsuleModel();
        
        $this->timecapsule->setName(isset($_REQUEST["name"]) ? $_REQUEST["name"] : "");
        $this->timecapsule->setPhone(isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : "");
        $this->timecapsule->setEmail(isset($_REQUEST["email"]) ? $_REQUEST["email"] : "");
        $this->timecapsule->setDate(isset($_REQUEST["date"]) ? $_REQUEST["date"] : "");
        $this->timecapsule->setMessage(isset($_REQUEST["message"]) ? $_REQUEST["message"] : "");
        
        $this->timecapsule->gravar($this->timecapsule);        
    }
    
    function __destruct() {
        $this->timecapsule = NULL;
    }
}

<?php

require './TimeCapsuleModel.php';

class TimeCapsuleView
{
    private $timecapsule;

    public function __construct() {
        $this->timecapsule = new TimeCapsuleModel();
        $this->timecapsule->setName(isset($_POST["name"]) ? $_POST["name"] : "");
        $this->timecapsule->setPhone(isset($_POST["phone"]) ? $_POST["phone"] : "");
        $this->timecapsule->setEmail(isset($_POST["email"]) ? $_POST["email"] : "");
        $this->timecapsule->setDate(isset($_POST["date"]) ? $_POST["date"] : "");
        $this->timecapsule->setMessage(isset($_POST["message"]) ? $_POST["message"] : "");
        $this->timecapsule->gravar($this->timecapsule);
    }
}

$view = new TimeCapsuleView();

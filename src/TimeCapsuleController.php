<?php

require_once 'TimeCapsuleView.php';
require_once 'TimeCapsuleModel.php';

class TimeCapsuleController
{

    private $view;

    public function __construct(){
        $this->view = new TimeCapsuleView();
    }

    public function exibir($pagina){
        $this->view->render($pagina);
    }

    public function lacrar(){
        $model = new TimeCapsuleModel();
        $model->setTo(isset($_POST["to"]) ? $_POST["to"] : "");
        $model->setFrom(isset($_POST["from"]) ? $_POST["from"] : "");
        $model->setDate(isset($_POST["date"]) ? $_POST["date"] : "");
        $model->setEmail(isset($_POST["email"]) ? $_POST["email"] : "");
        $model->setPhone(isset($_POST["phone"]) ? $_POST["phone"] : "");
        $model->setMessage(isset($_POST["message"]) ? $_POST["message"] : "");
        $sucesso = $model->gravar($model);

        if($sucesso){
            $this->exibir("sucesso");
        } else {
            $this->exibir("erro");
        }
    }

    public function __destruct(){
        $this->view = NULL;
    }
}
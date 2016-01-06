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
        $model->setName(isset($_GET["name"]) ? $_GET["name"] : "");
        $model->setDate(isset($_GET["date"]) ? $_GET["date"] : "");
        $model->setEmail(isset($_GET["email"]) ? $_GET["email"] : "");
        $model->setPhone(isset($_GET["phone"]) ? $_GET["phone"] : "");
        $model->setMessage(isset($_GET["message"]) ? $_GET["message"] : "");
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

<?php

require_once 'vendor/autoload.php';
require_once 'src/TimeCapsuleController.php';

    $controller = new TimeCapsuleController();
    $acao = isset($_POST['acao']) ? $_POST['acao'] : '';

    if($acao == "confirmar") {
        $controller->exibir("confirmacao");
    } elseif ($acao == "lacrar") {
        $controller->lacrar();
    } else {
        $controller->exibir("inicio");
    }

<?php

//require_once 'vendor/autoload.php';
require_once 'src/TimeCapsuleController.php';

/* paginas
 * index - esqueleto principal
 * formulario - para captura das informacoes a serem armazenadas
 * confirmacao - do preenchimento
 * erro - de execucao da aplicacao
 * sucesso - ao gravar a capsula
 * autor - da aplicacao
*/

    $controller = new TimeCapsuleController();
    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';

    if($acao == "confirmar") {
        $controller->exibir("confirmacao");
    } elseif ($acao == "lacrar") {
        $controller->lacrar();
    } else {
        $controller->exibir("home");
    }

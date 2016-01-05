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
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : '';

    if($pagina) {
       $controller->exibir("$pagina");
    } else {
        $controller->exibir('index');
    }

<?php
/*
 * Copyright (c) 2015 Joao Paulo Novais <joaopaulonovais@gmail.com>
 */

//require_once "autoLoad.php";
require_once __DIR__.'/../vendor/autoload.php';

if (Conexao::conectar()) {
    
    error_reporting(E_ALL);

    if(isset($_REQUEST["modulo"])) {
        TimeCapsuleView::apresentar();
    } else {
        ErroView::apresentarDestinoInvalido();
    }
} else {
    ErroView::apresentarNaoConectado();
}
?>

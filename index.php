<?php

require 'vendor/autoload.php';

    $controller = new TimeCapsuleController();
    $pagina = isset($_GET["pagina"]) ? $_GET["pagina"] : "";

    if($pagina) {
       $controller->$pagina();
    } else {
        $controller->index();
    }

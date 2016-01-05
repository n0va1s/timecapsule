<?php

class TimeCapsuleView
{
    public function render($pagina) {

        $path = "./assets/$pagina.php";
        if(file_exists($path)){
            include $path;
        } else {
            include "./assets/erro.php";
        }
    }

    public function show($message) {
        return print_r($message);
    }
}

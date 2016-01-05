<?php

class TimeCapsuleView
{
    public function render($pagina) {

        if(file_exists("../assets/$pagina.php")){
            include "../assets/$pagina.php";
        } else {
            include "../assets/erro.php";
        }
    }

    public function show($message) {
        return print_r($message);
    }
}

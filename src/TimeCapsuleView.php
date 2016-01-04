<?php

class TimeCapsuleView
{
    public function render($html) {
        $_GET($html);
    }

    public function show($message) {
        print_r($message);
    }
}

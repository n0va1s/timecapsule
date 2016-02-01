<?php
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
//Create a new SMTP instance
$smtp = new SMTP;
//Enable connection-level debug output
$smtp->do_debug = SMTP::DEBUG_CONNECTION;
try {
//Connect to an SMTP server
    if ($smtp->connect('r9-dallas.webserversystems.com', 587)) {
        //Say hello
        if ($smtp->hello('r9-dallas.webserversystems.com')) { //Put your host name in here
            //Authenticate
            if ($smtp->authenticate('mensagem@capsuladotempo.net', 'Bmx1cpoe')) {
                echo "Connected ok!";
            } else {
                throw new Exception('Authentication failed: ' . $smtp->getLastReply());
            }
        } else {
            throw new Exception('HELLO failed: '. $smtp->getLastReply());
        }
    } else {
        throw new Exception('Connect failed');
    }
} catch (Exception $e) {
    echo 'SMTP error: '. $e->getMessage(), "\n";
}
//Whatever happened, close the connection.
$smtp->quit(true);

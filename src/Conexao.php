<?php
/*
 * Copyright (c) 2015 Joao Paulo Cirino Silva de Novais <joaopaulonovais@gmail.com>
 */

class Conexao {

    private $SGBD;
    private $usuario;
    private $senha;
    private $servidor;
    private $banco;

    static $conn;

    function __construct(){
        $this->SGBD = "mysql";
        $this->usuario = "usrcapsule";
        $this->senha = "capsuleusr";
        $this->servidor = "localhost";
        $this->banco = "capsule";
    }
    
    static function conectar() {

        $DSN = "$this->SGBD:host=$this->servidor;dbname=$this->banco";

        try {
            session_start();
            Conexao::$conn = new PDO($DSN, $this->usuario, $this->senha);
            $sucesso = true;

        } catch (PDOException $e) {
            
            echo $e->getMessage();
            session_destroy();
            $sucesso = false;
        }

        return $sucesso;
    }
    
    static function getConexao() {
        return Conexao::$conn;
    }
    
    function __destruct(){
        Conexao::$conn = NULL;
        session_destroy();
    }
}

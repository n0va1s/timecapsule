<?php
/*
 * Copyright (c) 2015 Joao Paulo Cirino Silva de Novais <joaopaulonovais@gmail.com>
 */

class Email {

    private $SGBD = "mysql";
    private $usuario = "usrcapsule";
    private $senha = "capsuleusr";
    private $servidor = "localhost";
    private $banco = "capsule";

    public static $conexao;

    public static function conectar() {

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
    
    public static function desconectar() {
    
        session_destroy();
    }

    public static function getConexao() {
        return Conexao::$conn;
    }
}

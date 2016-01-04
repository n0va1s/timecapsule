<?php
/*
 * Copyright (c) 2015 Joao Paulo Cirino Silva de Novais <joaopaulonovais@gmail.com>
 */

class Conexao {

    const SGBD = "mysql";
    const usuario = "usrcapsule";
    const senha = "capsuleusr";
    const servidor = "localhost";
    const banco = "capsule";

    static $conn;

    static function conectar() {



        $DSN = self::SGBD+":host="+self::servidor+";dbname="+self::banco;

        try {
            session_start();
            Conexao::$conn = new PDO($DSN, self::usuario, self::senha);
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

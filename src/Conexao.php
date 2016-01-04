<?php

class Conexao {

    const SGBD = "mysql";
    const usuario = "usrcapsule";
    const senha = "capsuleusr";
    const servidor = "localhost";
    const banco = "capsule";

    static $conn;

    static function conectar() {

        $DSN = "self::SGBD:host=self::servidor;dbname=self::banco;"

        try {

            Conexao::$conn = new PDO($DSN, self::usuario, self::senha);
            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            session_destroy();
            return false;
        }
    }

    static function getConexao() {
        return Conexao::$conn;
    }

    static function desconectar(){

        Conexao::$conn = NULL;
    }
}

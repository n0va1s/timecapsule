<?php

class Conexao {

    const SGBD = "mysql";
    const usuario = "usrcapsule";
    const senha = "capsuleusr";
    const servidor = "localhost";
    const banco = "capsule";

    static $conn;

    static function conectar() {
        $DSN = self::SGBD.":host=".self::servidor.";dbname=".self::banco.";";
        try {
            $conn = new PDO($DSN, self::usuario, self::senha);
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
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

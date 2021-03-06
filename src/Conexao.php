<?php

class Conexao {
    //Producao
    const SGBD = 'mysql';
    const usuario = 'capsdtem_usrcaps';
    const senha = '(J+9O1??yK$A';
    const servidor = 'localhost';
    const banco = 'capsdtem_capsule';
    const charset = 'utf8';

    //Desenvolvimento
    /*
    const SGBD = "mysql";
    const usuario = "usrcapsule";
    const senha = "capsuleusr";
    const servidor = "localhost";
    const banco = "capsule";
    //const charset = "utf8";
    */
    static $conn;

    static function conectar() {
        //$DSN = self::SGBD.":host=".self::servidor.";dbname=".self::banco.";charset=".self::charset.";";
        $DSN = self::SGBD.":host=".self::servidor.";dbname=".self::banco.";";
        //$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
        try {
            //$conn = new PDO($DSN, self::usuario, self::senha, $opcoes);
            $conn = new PDO($DSN, self::usuario, self::senha);
            $conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            return $conn;
        } catch (PDOException $e) {
            echo "Erro na conexão!";
            echo $e->getMessage();
        }
    }

    static function getConexao() {
        return Conexao::$conn;
    }

    static function desconectar(){
        Conexao::$conn = NULL;
    }
}

<?php
/*
 * Copyright (c) 2015 Joao Paulo Cirino Silva de Novais <joaopaulonovais@gmail.com>
 *
 */

class TimeCapsuleDAO {

    private $sql;
    private $conn;

    function __construct() {
        $this->conn = Conexao::conectar();
    }
    
    public function inserir(TimeCapsuleModel $timecapsule) {
    	
        $this->sql = $this->conn->prepare("insert into message (nam_message,
                                                                dat_message,
                                                                eml_message,
                                                                tel_message)
                                                        values (?,?,?,?)");
                                         
        return $this->sql->execute($timecapsule->getName(),
                                   $timecapsule->getDate(),
                                   $timecapsule->getEmail(),
                                   $timecapsule->getMessage());
                      
    }
    
    public function consultarParaEnvio() {
        
        $sql = "select *
                  from message m
                where ind_enviado = 'N'";
        
        return self::query($sql, $escolaContato);
        
        $this->sql = $this->conn->prepare("select * from message)
                                                  values (?,?,?,?)");
                                         
        return $this->sql->execute($timecapsule->getName(),
                                   $timecapsule->getDate(),
                                   $timecapsule->getEmail(),
                                   $timecapsule->getMessage());
    }
    
    function __destruct() {
        Conexao::desconectar();
    }
}

<?php

require_once 'Conexao.php';

class TimeCapsuleDAO {

    private $sql;
    private $conn;

    function __construct() {
        $this->conn = Conexao::conectar();
    }

    public function inserir(TimeCapsuleModel $model) {
        try {
            $this->sql = $this->conn->prepare("insert into message (nam_message,dat_message,eml_message,tel_message,txt_message)
                                                            values (:nam_message,:dat_message,:eml_message,:tel_message,:txt_message);");

            $this->sql->bindValue(":nam_message", $model->getName());
            $this->sql->bindValue(":dat_message", $model->getDate());
            $this->sql->bindValue(":eml_message", $model->getEmail());
            $this->sql->bindValue(":tel_message", $model->getPhone());
            $this->sql->bindValue(":txt_message", $model->getMessage());

            $result = $this->sql->execute();
       } catch (Exception $e) {
            print "Ocorreu um erro ao tentar gravar a mensagem,tente novamente mais tarde.";
            print $e->getMessage();
            $result = false;
        }
        return $result;
    }

    public function consultarParaEnvio() {
        try {
            $this->sql = $this->conn->prepare("select *
                                                 from message m
                                              where dat_message <= '2015-01-01'
                                                and m.ind_enviado = 'N';");

            $result = $this->sql->execute();

        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar consultar as mensagens a serem enviadas";
            print $e->getMessage();
            $result = false;
        }
        return $result;
    }

    function __destruct() {
        Conexao::desconectar();
    }
}
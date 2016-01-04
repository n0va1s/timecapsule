<?php

require_once './Conexao.php';

class TimeCapsuleDAO {

    private $sql;
    private $conn;

    function __construct() {
        $this->conn = Conexao::conectar();
    }

    public function inserir(TimeCapsuleModel $timecapsule) {

        try {

            $this->sql = $this->conn->prepare("insert into message (nam_message,
                                                                    dat_message,
                                                                    eml_message,
                                                                    tel_message,
                                                                    txt_message)
                                                            values (:name,
                                                                    :date,
                                                                    :email,
                                                                    :phone,
                                                                    :message)");

            $this->sql->bindValue(":name", $timecapsule->getName());
            $this->sql->bindValue(":date", $timecapsule->getDate());
            $this->sql->bindValue(":email", $timecapsule->getEmail());
            $this->sql->bindValue(":phone", $timecapsule->getPhone());
            $this->sql->bindValue(":message", $timecapsule->getMessage());

            return $this->sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar gravar a mensagem,tente novamente mais tarde.";
            print $e->getMessage();
        }
    }

    public function consultarParaEnvio() {
        try {

            $this->sql = $this->conn->prepare("select * from message m where m.ind_enviado = 'N'");

            return $this->sql->execute();

        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar consultar as mensagens a serem enviadas";
            print $e->getMessage();
        }
    }

    function __destruct() {
        Conexao::desconectar();
    }
}

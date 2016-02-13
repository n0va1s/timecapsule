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
            $this->sql = $this->conn->prepare("insert into message (nam_to_message,
                                                                    nam_from_message,
                                                                    dat_message,
                                                                    eml_message,
                                                                    tel_message,
                                                                    txt_message)
                                                            values (:nam_to_message,
                                                                    :nam_from_message,
                                                                    :dat_message,
                                                                    :eml_message,
                                                                    :tel_message,
                                                                    :txt_message);");

            $this->sql->bindValue(":nam_to_message", $model->getTo());
            $this->sql->bindValue(":nam_from_message", $model->getFrom());
            $this->sql->bindValue(":dat_message", $model->getDate());
            $this->sql->bindValue(":eml_message", $model->getEmail());
            $this->sql->bindValue(":tel_message", $model->getPhone());
            $this->sql->bindValue(":txt_message", $model->getMessage());

            return $this->sql->execute();
       } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar gravar a mensagem,tente novamente mais tarde.";
            echo $e->getMessage();
        }
    }
    //Consulta todas as mensagens a serem enviadas ate o dia de hoje
    public function consultarCapsulasParaEnvio() {
        try {
            $this->sql = $this->conn->prepare("select *
                                                 from message m
                                              where dat_message <= DATE_FORMAT(NOW(),'%Y-%m-%d')
                                                and m.ind_enviado = 'N'");

            $this->sql->execute();
            return $this->sql->fetchAll();

        } catch (Exception $e) {
            echo "Ocorreu um erro ao tentar consultar as mensagens a serem enviadas";
            echo $e->getMessage();
        }
    }
    //Altera a situacao da capsula para enviada
    public function atualizarCapsulaEnviada($seq_message) {
        try {
            $this->sql = $this->conn->prepare("update message set ind_enviado = 'S'
                                               where seq_message = :seq_message");
            $this->sql->bindValue(":seq_message", $seq_message);
            return $this->sql->execute();

        } catch (Exception $e) {
            echo "Nao foi possivel alterar a situação do sequencial - ".$seq_message;
            echo $e->getMessage();
        }
    }

    function __destruct() {
        Conexao::desconectar();
    }
}

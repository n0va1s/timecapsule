  <?php

require_once 'Conexao.php';

class TimeCapsuleDAO {

    private $conn;

    function __construct() {
        $this->conn = Conexao::conectar();
    }

    public function inserir(TimeCapsuleModel $model) {
        try {
            $query = "insert into message (nam_to_message,nam_from_message,
                                           dat_message,eml_message,
                                           tel_message,txt_message)
                                   values (:nam_to_message,:nam_from_message,
                                           :dat_message,:eml_message,
                                           :tel_message,:txt_message)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(":nam_to_message", $model->getTo());
            $stmt->bindValue(":nam_from_message", $model->getFrom());
            $stmt->bindValue(":dat_message", $model->getDate());
            $stmt->bindValue(":eml_message", $model->getEmail());
            $stmt->bindValue(":tel_message", $model->getPhone());
            $stmt->bindValue(":txt_message", $model->getMessage());

            return $stmt->execute();
       } catch (Exception $e) {
            echo "Erro ao incluir a mensagem \n".$e->getMessage();
        }
    }
   //Altera todas as informacoes cadastradas
    public function alterar(TimeCapsuleModel $model) {
        try {
            $query = "update message
                        set nam_to_message = :nam_to_message,
                            nam_from_message = :nam_from_message,
                            dat_message = :dat_message,
                            eml_message = :eml_message,
                            tel_message = :tel_message,
                            txt_message = :txt_message
                      where seq_message = :seq_message";

            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(":nam_to_message", $model->getTo());
            $stmt->bindValue(":nam_from_message", $model->getFrom());
            $stmt->bindValue(":dat_message", $model->getDate());
            $stmt->bindValue(":eml_message", $model->getEmail());
            $stmt->bindValue(":tel_message", $model->getPhone());
            $stmt->bindValue(":txt_message", $model->getMessage());
            $stmt->bindValue(":seq_message", $model->getSeq());

            return $stmt->execute();
       } catch (Exception $e) {
            echo "Erro ao alterar a mensagem \n".$e->getMessage();
        }
    }

    //Lista todas as mensagens cadastradas
    public function listar() {
        try {
           $query = "select *
                       from message m";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Erro ao listar as mensagens \n".$e->getMessage();
        }
    }

    //Consulta todas as mensagens a serem enviadas ate o dia de hoje
    public function consultarCapsulasParaEnvio() {
        try {
           $query = "select *
                       from message m
                     where dat_message <= DATE_FORMAT(NOW(),'%Y-%m-%d')
                       and m.ind_enviado = 'N'";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (Exception $e) {
            echo "Erro ao consultar as mensagens para envio \n".$e->getMessage();
        }
    }
    //Altera a situacao da capsula para enviada
    public function atualizarCapsulaEnviada($seq) {
        try {
          $query = "update message
                        set ind_enviado = :ind_enviado
                      where seq_message = :seq_message";

          $stmt = $this->conn->prepare($query);

          $stmt->bindValue(":ind_enviado", "S");
          $stmt->bindValue(":seq_message", $seq);
          //Debug
          //echo $stmt->debugDumpParams();
          //var_dump($stmt->errorInfo());
          return $stmt->execute();
      } catch (Exception $e) {
          echo "Erro ao alterar a situacao da mensagem \n".$e->getMessage();
      }
    }

    function __destruct() {
        Conexao::desconectar();
    }
}

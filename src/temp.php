<?php

require "TimeCapsuleDAO.php";

$timecapsuleDAO = new TimeCapsuleDAO();

$msg = $timecapsuleDAO->atualizarCapsulaEnviada(24);
if($msg){
  echo "Cápsula enviada! Sequencial: XXX";
} else {
  echo "Erro ao atualizar a mensagem para enviada! Sequencial: XXX";
}

 ?>

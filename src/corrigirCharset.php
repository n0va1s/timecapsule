<?php

require "TimeCapsuleModel.php";

$timecapsuleModel = new TimeCapsuleModel();

foreach ($timecapsuleModel->consultar() as $mensagem) {
    //$timecapsuleModel->setSeq($mensagem["seq_message"]);
    //$timecapsuleModel->setTo(utf8_decode($mensagem["nam_to_message"]));
    //$timecapsuleModel->setFrom(utf8_decode($mensagem["nam_from_message"]));
    //$timecapsuleModel->setPhone($mensagem["num_phone"]);
    //$timecapsuleModel->setEmail($mensagem["eml_message"]);
    //$timecapsuleModel->setDate($mensagem["dat_message"]);
    //$timecapsuleModel->setMessage(utf8_decode($mensagem["txt_message"]));

    //$timecapsuleModel->gravar($timecapsuleModel);

    echo "Sequencial corrigido: ".$mensagem["seq_message"]."\n";
    echo "To: ".utf8_decode($mensagem["nam_to_message"])."\n";
    echo "From: ".utf8_decode($mensagem["nam_from_message"])."\n";
    echo "Message: ".utf8_decode($mensagem["txt_message"])."\n";
    echo "------- \n";
}
$timecapsuleDAO = NULL;
$timecapsuleModel = NULL;
?>

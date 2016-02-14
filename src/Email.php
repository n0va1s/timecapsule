<?php

require 'TimeCapsuleDAO.php';
require '/home/capsdtempo/public_html/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

class Email {

    private $timeCapsuleDAO;
    private $mail;

    public function __construct(){
        $this->timeCapsuleDAO = new TimeCapsuleDAO();
        $this->mail = new PHPMailer();
    }

    public function configurar(){
      $this->mail->isSMTP();                                      // Set mailer to use SMTP
      $this->mail->Host = 'r9-dallas.webserversystems.com';    // Specify main and backup SMTP servers
      $this->mail->Port = 25;                                    // TCP port to connect to

      $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
      $this->mail->Username = 'mensagem@capsuladotempo.net';      // SMTP username
      $this->mail->Password = 'Bmx1cpoe';                           // SMTP password
      $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

      $this->mail->setFrom('mensagem@capsuladotempo.net', 'Capsula do Tempo');
      $this->mail->addReplyTo('mensagem@capsuladotempo.net', 'Capsula do Tempo');
      //$this->mail->addBCC('jp.trabalho@gmail.com');

      //$this->mail->isHTML(true);                                  // Set email format to HTML
      $this->mail->CharSet = "UTF-8";
      $this->mail->Subject = "Chegou o dia de abrir a sua capsula do tempo";
    }

    public function enviar() {
        $mensagens = $this->timeCapsuleDAO->consultarCapsulasParaEnvio();
        foreach ($mensagens as $mensagem) {
            $this->mail->addAddress($mensagem["eml_message"], $mensagem["nam_to_message"]);     // Add a recipient
            //Informacao para compor email
            $seqMessage = $mensagem["seq_message"];
            $toMessage = utf8_decode($mensagem["nam_to_message"]);
            $fromMessage = utf8_decode($mensagem["nam_from_message"]);
            $txtMessage = utf8_decode($mensagem["txt_message"]);
            $this->mail->Body = '
                  <html>
                    <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <style type="text/css">
                      body {margin:0px;font-family:Verdana;font-size:12px;color: #666666;}
                      div {padding: 0;width: auto;}
                      a{color: blue;text-decoration: none;}
                      a:hover {color: gray;text-decoration: none;}
                    </style>
                    </head>
                    <body>
                      <div>
                        <center><img src="http://capsuladotempo.net/assets/img/banner.png" /></center>
                      <div>
                      <div>
                        <p>
                        Ol&aacute; '.$toMessage.', h&aacute; algum tempo '
                        .$fromMessage.' criou uma c&aacute;psula do tempo para ser aberta hoje.
                        Pronto para conferir?
                        </p>
                        <p>
                        Esta foi a mensagem:<br />
                        '.$txtMessage.'
                        </p>
                        <p>
                        Que seus sonhos se realizem e que voc&ecirc; fa&ccedil;a desse um mundo ainda melhor!
                        <br />
                        </p>
                        Um abra&ccedil;o da equipe da <a href=http://capsuladotempo.net>C&aacute;psula do Tempo</a>
                      </div>
                    </body>
                  </html>';
            $this->mail->AltBody = "Olá ".$toMessage.", há algum tempo ".$fromMessage.
                              " mandou uma mensagem para ser aberta hoje. Pronto para conferir?
                              Esta foi a mensagem: ".$txtMessage."
                               Que seus sonhos se realizem e que você faça desse um mundo ainda melhor!
                              Um abraço da equipe da Cápsula do Tempo http://capsuladotempo.net";
            if(!$this->mail->send()) {
                echo "Messagem não enviada! Sequencial: ".$seqMessage;
                echo " - Erro: ". $this->mail->ErrorInfo."\n";
            } else { //Mensagem enviada
                //Atualizar a mensagem para enviada
                $atualizada = $this->timeCapsuleDAO->atualizarCapsulaEnviada($seqMessage);
                if($atualizada){
                  echo "Cápsula enviada! Sequencial: ".$seqMessage."\n";
                } else {
                  echo "Erro ao atualizar a mensagem para enviada! Sequencial: ".$seqMessage."\n";
                }
            }
        }
    }

    public function __destruct(){
        $this->timeCapsuleDAO = NULL;
        $this->mail = NULL;
    }
}
//Envia os emails do dia
$obj = new Email();
$obj->configurar();
$obj->enviar();

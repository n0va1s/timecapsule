<?php

require 'TimeCapsuleDAO.php';
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

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
      $this->mail->Port = 587;                                    // TCP port to connect to

      $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
      $this->mail->Username = 'mensagem@capsuladotempo.net';      // SMTP username
      $this->mail->Password = 'Bmx1cpoe';                           // SMTP password
      $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

      $this->mail->setFrom('mensagem@capsuladotempo.net', 'C&aacute;psula do Tempo');
      $this->mail->addReplyTo('mensagem@capsuladotempo.net', 'C&aacute;psula do Tempo');
      $this->mail->addBCC('jp.trabalho@gmail.com');

      $this->mail->isHTML(true);                                  // Set email format to HTML
      $this->mail->charset = "UTF-8";
      $this->mail->Subject = 'Chegou o dia de abrir a sua c&aacute;psula do tempo';
    }

    public function enviar() {
        $mensagens = $this->timeCapsuleDAO->consultarCapsulasParaEnvio();
        foreach ($mensagens as $mensagem) {
            $this->mail->addAddress($mensagem["eml_message"], $mensagem["nam_to_message"]);     // Add a recipient

            $this->mail->Body = "
                  <style type='text/css'>
                  body {margin:0px;font-family:Verdana;font-size:12px;color: #666666;}
                  div {padding: 0;width: auto;}
                  a{color: blue;text-decoration: none;}
                  a:hover {color: gray;text-decoration: none;}
                  </style>
                  <html>
                    <div>
                      <p>
                      Ol&aacute; ".utf8_decode($mensagem["nam_to_message"])." h&aacute; algum tempo "
                      .utf8_decode($mensagem["nam_from_message"])."criou uma c&aacute;psula do tempo para ser aberta hoje.
                      Pronto para conferir?
                      </p>
                      <p>
                      Esta foi a mensagem:<br />
                      ".utf8_decode($mensagem["txt_message"])."
                      </p>
                      <p>
                      Que seus sonhos se realizem e que voc&ecirc; fa&ccedil;a desse um mundo ainda melhor!
                      <br />
                      </p>
                      Um abra&ccedil;o da equipe da <a href=http://capsuladotempo.net>C&aacute;psula do Tempo</a>
                    </div>
                  </html>";
            $this->mail->AltBody = "Olá ".utf8_decode($mensagem["nam_to_message"]).", há algum tempo".utf8_decode($message["nam_from_message"]).
                              "mandou uma mensagem para ser aberta hoje. Pronto para conferir?
                              Esta foi a mensagem: ".utf8_decode($mensagem["txt_message"])."
                              Que seus sonhos se realizem e que você faça desse um mundo ainda melhor!
                              Um abraço da equipe da Cápsula do Tempo http://capsuladotempo.net";
            if(!$this->mail->send()) {
                echo "Messagem não enviada! Sequencial: ".$mensagem["seq_message"];
                echo ' - Erro: ' . $this->mail->ErrorInfo."\n";
            } else {
                $this->timeCapsuleDAO->atualizarCapsulaEnviada($mensagem["seq_message"]);
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

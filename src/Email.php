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
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.capsuladotempo.net;localhost';    // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'mensagem@capsuladotempo.net';      // SMTP username
      $mail->Password = 'Bmx1cpoe';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom('mensagem@capsuladotempo.net', 'Cápsula do Tempo');
      //$mail->addAddress('mensagem@capsuladotempo.net');               // Name is optional
      $mail->addReplyTo('mensagem@capsuladotempo.net', 'Cápsula do Tempo');
      //$mail->addCC('cc@example.com');
      $mail->addBCC('jp.trabalho@gmail.com');

      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Abra a sua Cápsula do Tempo';
      $mail->Body    = "<style type='text/css'>
      body {
        margin:0px;
        font-family:Verdana;
        font-size:12px;
        color: #666666;
      }
      div {
        padding: 0;
        width: auto;
      }
      a{
        color: blue;
        text-decoration: none;
      }
      a:hover {
        color: gray;
        text-decoration: none;
      }
      </style>
      <html>
        <div>
          <p>
          Ol&aacute; ".$mensagem["nam_to_message"]." h&aacute; algum tempo voc&ecirc; mandou
          uma mensagem para o seu EU do futuro. Pronto para conferir?
          </p>
          <p>
          Esta foi a sua mensagem:<br />
          ".$mensagem["txt_message"]."
          </p>
          <p>
          Que seus sonhos se realizem e que voc&ecirc; fa&ccedil;a desse um mundo ainda melhor!
          <br />
          Um abra&ccedil;o da equipe da <a href=http://capsuladotempo.net>C&aacute;psula do Tempo</a>
          </p>
        </div>
      </html>";
      $mail->AltBody = "Olá ".$mensagem["nam_to_message"].", há algum tempo você mandou
                        uma mensagem para o seu EU do futuro. Pronto para conferir?
                        Esta foi a sua mensagem: ".$mensagem["txt_message"]."
                        Que seus sonhos se realizem e que você façaa desse um mundo ainda melhor!
                        Um abraço da equipe da Cápsula do Tempo";

    }

    public function enviar() {

        $mensagens = $this->timeCapsuleDAO->consultarCapsulasParaEnvio();

        foreach ($mensagens as $mensagem) {
            $mail->addAddress($mensagem["eml_message"], $mensagem["nam_to_message"]);     // Add a recipient
            if(!$mail->send()) {
                echo "Messagem não enviada! Sequencial: ".$mensagem["seq_message"];
                echo 'Mailer Error: ' . $mail->ErrorInfo;
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

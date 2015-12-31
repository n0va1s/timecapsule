<?php
/*
 * Copyright (c) 2015 Joao Paulo Cirino Silva de Novais <joaopaulonovais@gmail.com>
 */

require './TimeCapsuleDAO.php';

class Email {

    private $timeCapsuleDAO;
    
    public function __construct(){
        $this->timeCapsuleDAO = new TimeCapsuleDAO();
        session_start();
    }

    public static function enviar() {
        
        $dat_envio = date("d/m/Y");
        $hor_envio = date("H:i:s");
        
        $arquivo = "
            <style type='text/css'>
            body {
            margin:0px;
            font-family:Verdane;
            font-size:12px;
            color: #666666;
            }
            a{
            color: #666666;
            text-decoration: none;
            }
            a:hover {
            color: #FF0000;
            text-decoration: none;
            }
            </style>
            <html>
                <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
                    <tr>
                      <td>
            <tr>
                         <td width='500'>Nome:$nome</td>
                        </tr>
                        <tr>
                          <td width='320'>E-mail:<b>$email</b></td>
               </tr>
                <tr>
                          <td width='320'>Telefone:<b>$telefone</b></td>
                        </tr>
               <tr>
                          <td width='320'>Opções:$escolhas</td>
                        </tr>
                        <tr>
                          <td width='320'>Mensagem:$nome</td>
                        </tr>
                    </td>
                  </tr>  
                  <tr>
                    <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
                  </tr>
                </table>
            </html>
        ";    
        
        // É necessário indicar que o formato do e-mail é html
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: $nome <$email>';
        //$headers .= "Bcc: $EmailPadrao\r\n";

        $mensagens = $this->timeCapsuleDAO->consultarParaEnvio();
        
        foreach ($mensagens as $mensagem) {
            $emailenviado = mail($mensagem["email"],
                            "Mensagem da Cápsula do Tempo...",
                            $arquivo, 
                            $headers);
        }
        
        
        if($emailenviado){
        $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
        echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
        } else {
        $mgm = "ERRO AO ENVIAR E-MAIL!";
        echo "";
        }
    }
    
    public function __destruct(){
        $this->timeCapsuleDAO = NULL;
        session_destroy();
    }
}
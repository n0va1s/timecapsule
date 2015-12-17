<?php
/**
 * @package Debug
 * @access  public
 * @filesource
 */

class Debug {

    public static function debugObjeto ($objeto, $mensagem) {
    	print "<pre>";
        print $mensagem;
        print "<hr>";
        var_dump($objeto);
        print "<hr>";
        print "</pre>";                	
    }
    
    public static function debugVariavel ($variaval, $mensagem) {
    	print $variavel." -> ".$mensagem;
        print "<br />";
    }
    
    public static function geraLog ($numPasso, $mensagem) {
    	//TODO:Criar um arquivo e inserir as mensagens nele
    	print $numPasso." # ".$mensagem." # Data/Hora:".date("d-m-Y H:i:s");
        print "<br />";
    }
}
?>

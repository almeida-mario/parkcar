<?php

/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file controle.php 
 * @copyright 17/04/2013 - 09:03:14 
 */

require_once ('../configs/config.inc.php');

$objSessao = new sessao(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
$objSistema = new sistema(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
$objSessao->montaSessao();

 if(!$_REQUEST["url"]){
	 
	 $url = $_SERVER['PHP_SELF'];
     $length = strlen($url);
     $posicao = strpos($url,'parkcar.', 5);
     $url = substr($url, $posicao, $length);
 }
 
 $user = strtolower($_SESSION['SISTEMAWEB']['DADOS']['USER_NAME'][0]);
 $user = explode(' ', $user);
 $objSmarty->assign('USER', ucwords($user[0] . ' ' . $user[count($user) - 1]));
 
 $log_user = $_SESSION['SISTEMAWEB']['DADOS']['LOGIN'][0];
 $log_data = date('d/m/Y H:m:s');
 
 
 $objSistema->setIdUsuario($_SESSION["SISTEMAWEB"]["DADOS"]["USER_ID"][0]);

 switch($url){
 
  case 'parkcar.controle.php':
 
     $objSmarty->assign('URL1',base64_encode('parkcar.cadastro.usuarios.php'));
	 $objSmarty->assign('URL2',base64_encode('parkcar.cadastro.precos.php'));
	 $objSmarty->assign('URL3',base64_encode('parkcar.cadastro.tipo_veiculos.php'));
	 $objSmarty->assign('URL4',base64_encode('parkcar.controle.estacionamento.php'));
	 $objSmarty->assign('URL5',base64_encode('parkcar.relatorio.caixa.php'));
     $objSmarty->assign('DADOS', $_SESSION["SISTEMAWEB"]["DADOS"]);
	 $objSmarty->display("home.tpl");
	 
	 exit;
	  
  break;

  
  default:
  
     $pasta=APP_ROOT.'modulos/sistema/'.base64_decode($_REQUEST["url"]);
      
     $objSmarty->assign('DADOS', $_SESSION["SISTEMAWEB"]["DADOS"]);
	
	 include $pasta;
    
  break;	
	
}

?>
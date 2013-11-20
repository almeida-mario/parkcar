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


 $url = $_SERVER['PHP_SELF'];
 $length = strlen($url);
 $posicao = strpos($url,'parkcar.', 5);
 $url = substr($url, $posicao, $length);
 
 $user = strtolower($_SESSION['SISTEMAWEB']['DADOS']['NOME'][0]);
 $user = explode(' ', $user);
 
 $objSmarty->assign('USER', ucwords($user[0] . ' ' . $user[count($user) - 1]));
 
 $log_user = $_SESSION['SISTEMAWEB']['DADOS']['LOGIN'][0];
 $log_data = date('d/m/Y H:m:s');
 
 
 $objSistema->setIdUsuario($_SESSION["SISTEMAWEB"]["DADOS"]["USER_ID"][0]);



 //exit;

 switch($url){
 
  case 'parkcar.controle.php':
 
     $objSmarty->assign('URL1',base64_encode('parkcar.cadastro.usuarios.php'));
     $objSmarty->assign('DADOS', $_SESSION["SISTEMAWEB"]["DADOS"]);
	 $objSmarty->display("home.tpl");
	 
	 exit;
	  
  break;
  
  
  default:
   
     $perms_salvar = $dadosPager["CADASTRAR"][0];
     $perms_alterar = $dadosPager["ALTERAR"][0];
     $perms_excluir = $dadosPager["EXCLUIR"][0];
	 
	 $objSmarty->assign("KEYMODULO", $dadosPager["IDMODULO"][0]);
     $objSmarty->assign('MODULOS', $_SESSION["SISTEMAWEB"]["MODULOS"]);
     $objSmarty->assign('MENUS', $_SESSION["SISTEMAWEB"]["MENUS"]);
     $objSmarty->assign('PERMISSOES', $_SESSION["SISTEMAWEB"]["PERMISSOES"]);
    
  break;	
	
}

?>
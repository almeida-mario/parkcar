<?php
/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file parkcar.cadastro.usuarios.php
 * @copyright 2013
 */	   

   require_once ('../configs/config.inc.php');
   

   //$objSistema = new sistema(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
   
   $case=$_REQUEST["case"];
   
   
   
   
  
   switch($case){
	   
	   case 1: // Busca os Usuário Cadastrados
	   
	       echo"<pre>";print_r($_REQUEST);
	   
	   break;
	   
	   default:  // Retorna View da Tela
	   
	     $objSmarty->assign("JS",APP_);
	     $objSmarty->display("modulos/sistema/parkcar.cadastro.usuarios.tpl");	
	   
	   break;
	   
   }
    
 
   
?>
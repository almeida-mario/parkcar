<?php
/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file parkcar.cadastro.usuarios.php
 * @copyright 2013
 */	   
    $case=$_REQUEST["case"];
	
	if($case > 0){
		require_once ('../../configs/config.inc.php');
        $objDataset = new dataset(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
	}
	
          
   
   
   
   switch($case){
	   
	   case 1: // Busca os Usuário Cadastrados
	   
	     echo"<pre>";
		 print_r($objDataset->smartset("select * from tb_usuario"));
		  
	   
	   break;
	   
	   default:  // Retorna View da Tela
	   
	     $objSmarty->assign("JS",APP_);
	     $objSmarty->display("modulos/sistema/parkcar.cadastro.usuarios.tpl");	
	   
	   break;
	   
   }
    
 
   
?>
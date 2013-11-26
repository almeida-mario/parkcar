<?php
/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file parkcar.cadastro.usuarios.php
 * @copyright 2013
 */	   
    $case=$_REQUEST["case"];
	
	if($case > 0){ // Carrega as Classes para chamadas Ajax;
	
		require_once ('../../configs/config.inc.php');
        $objDataset = new dataset(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
		
	}
	
          
   
   
   
   switch($case){
	   
	   case 1: // Busca os Usuário Cadastrados
	   
		 $dados=$objDataset->smartset("select * from tb_usuario");
		 $objSmarty->assign("BUSCA",$dados);
		 $objSmarty->display("modulos/sistema/parkcar.busca.usuarios.tpl");	
		  
	   break;
	   
	   case 2: // Salvar Dados
	   
	      echo"<pre>";print_r($_REQUEST);
	   
	   break;
	   
	   default:  // Retorna View da Tela
	   
	     $objSmarty->display("modulos/sistema/parkcar.cadastro.usuarios.tpl");	
	   
	   break;
	   
   }
    
 
   
?>
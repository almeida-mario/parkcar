<?php
/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file parkcar.cadastro.usuarios.php
 * @copyright 2013
 */	   
    $case=$_REQUEST["case"];
	
	if($case > 0){ // Carrega as Classes para chamadas Ajax;
	
		require_once ('../../configs/config.inc.php');
        $objSessao = new sessao(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
        $objSistema = new sistema(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
        $objDataset = new dataset(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT)); 
        $objSessao->montaSessao();
		
		
		 $log_user = $_SESSION['SISTEMAWEB']['DADOS']['LOGIN'][0];
         $log_data = date('Y-m-d H:i:s');
		
	}
	
          
   
   
   
   switch($case){
	   
	   case 1: // Busca os Usuário Cadastrados
	   
	   
	     if($_REQUEST["filtro"]){ // Filtra os dados por nome
		 
		     $campo=array($_REQUEST["filtro"].'%');
			 
			 $dados=$objDataset->smartset("select * from tb_usuario where user_name like :v1",$campo);
			 
		 }else{
			 
			 $dados=$objDataset->smartset("select * from tb_usuario");
			 
		 }
	   
	   	 
		 // Discriptografia da senha;
		  
		 for($a=0 ;$a <count($dados["SENHA"]);++$a){
			  
			  $dados["SENHA"][$a]=base64_decode($dados["SENHA"][$a]);
		   	 
		 }
		 	 
		 $objSmarty->assign("BUSCA",$dados);
		 $objSmarty->display("modulos/sistema/parkcar.busca.usuarios.tpl");	
		  
	   break;
	   
	   case 2: // Salvar Dados
	   
	   
	       if(empty($_REQUEST["id_user"])){ // Variável  vazia insert; 
			   
			   
			   $sql="INSERT INTO tb_usuario(user_name, login, senha, log, log_data) VALUES (:v1,:v2,:v3,:v4,:v5)";
			   $dados=array(strtoupper($_REQUEST["nome_user"]),$_REQUEST["login_user"],base64_encode($_REQUEST["senha_user"]),$log_user,$log_data);
			   
			   
			   $exec=$objDataset->smartset($sql,$dados);
			   
			   
		   }else{ //Variável preenchida  update 
			   
			    

			   $sql="UPDATE tb_usuario SET user_name = :v1 , login = :v2, senha = :v3, log = :v4, log_data = :v5  WHERE user_id = :v6";
			   $dados=array(strtoupper($_REQUEST["nome_user"]),$_REQUEST["login_user"],base64_encode($_REQUEST["senha_user"]),$log_user,$log_data,$_REQUEST["id_user"]);
			   
			   $exec=$objDataset->smartset($sql,$dados);
		   }
	   
	        
			   print_r($exec); // Retorna Execução se valor retornado = 1 - Transação Realizada  senão  Retorna Mensagem de Erro

	   
	   break;
	   
	   
	   case 3: // Deletar Dados
	   
	          $sql="DELETE FROM tb_usuario where user_id = :v1";
			  $dados=array($_REQUEST["id_user"]);
	          $exec=$objDataset->smartset($sql,$dados);
			  
			  print_r($exec); // Retorna Execução se valor retornado = 1 - Transação Realizada  senão  Retorna Mensagem de Erro
	   
	   break;
	   
	   default:  // Retorna View da Tela
	   	   
	     $objSmarty->display("modulos/sistema/parkcar.cadastro.usuarios.tpl");	
	   
	   break;
	   
   }
    
 
   
?>
<?php
/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file parkcar.cadastro.precos.php
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
         $log_data = date('Y-m-d H:m:s');
		
	}
	
          
   
   
   
   switch($case){
	   
	   case 1: // Busca os Preços
	   
	   
	     if($_REQUEST["filtro"]){ // Filtra os dados Descrição do preço.
		 
		     $campo=array($_REQUEST["filtro"].'%');
			 
			 $dados=$objDataset->smartset("select * from tb_preco where descricao like :v1",$campo);
			 
		 }else{
			 
			 $dados=$objDataset->smartset("select * from tb_preco");
			 
		 }
	   
	   	
		 	 
		 $objSmarty->assign("BUSCA",$dados);
		 $objSmarty->display("modulos/sistema/parkcar.busca.preco.tpl");	
		  
	   break;
	   
	   case 2: // Salvar Dados
	   
	   
	       if(empty($_REQUEST["id_preco"])){ // Variável  vazia insert; 
			   
			   $vlr_hora=str_replace(",",".",$_REQUEST["vlr_hora"]); // Substituir "," por "." php numero padrão americano exemplo: 10.55;
			   $vlr_ad_hora=str_replace(",",".",$_REQUEST["vlr_ad_hora"]);
			   $vlr_ad_fracao=str_replace(",",".",$_REQUEST["vlr_ad_fracao"]);
			   
			   $sql="INSERT INTO tb_preco (descricao, valor_hora, valor_adcional_hora, valor_adcional_fracao) VALUES (:v1, :v2, :v3, :v4)";
			   $dados=array(strtoupper($_REQUEST["descricao"]),$vlr_hora,$vlr_ad_hora,$vlr_ad_fracao); 
			  
			   
			   
			   $exec=$objDataset->smartset($sql,$dados);
			   
			   
		   }else{ //Variável preenchida  update 
			   
			   $vlr_hora=str_replace(",",".",$_REQUEST["vlr_hora"]); // Substituir "," por "." php numero padrão americano exemplo: 10.55;
			   $vlr_ad_hora=str_replace(",",".",$_REQUEST["vlr_ad_hora"]);
			   $vlr_ad_fracao=str_replace(",",".",$_REQUEST["vlr_ad_fracao"]);
			   
			   $sql="UPDATE tb_preco SET descricao = :v1 , valor_hora = :v2, valor_adcional_hora = :v3, valor_adcional_fracao = :v4 WHERE id_preco = :v5";
			   $dados=array(strtoupper($_REQUEST["descricao"]),$vlr_hora,$vlr_ad_hora,$vlr_ad_fracao,$_REQUEST["id_preco"]);
			   
			   $exec=$objDataset->smartset($sql,$dados);
			   
			   
		   }
	   
	        
			   print_r($exec); // Retorna Execução se valor retornado = 1 - Transação Realizada  senão  Retorna Mensagem de Erro

	   
	   break;
	   
	   
	   case 3: // Deletar Dados
	   
	          $sql="DELETE FROM tb_preco where id_preco = :v1";
			  $dados=array($_REQUEST["id_preco"]);
	          $exec=$objDataset->smartset($sql,$dados);
			  
			  print_r($exec); // Retorna Execução se valor retornado = 1 - Transação Realizada  senão  Retorna Mensagem de Erro
	   
	   break;
	   
	   default:  // Retorna View da Tela
	   	   
	     $objSmarty->display("modulos/sistema/parkcar.cadastro.precos.tpl");	
	   
	   break;
	   
   }
    
 
   
?>
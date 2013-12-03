<?php
/**
 * @author  Mário Almeida    <prog.almeida@gmail.com>
 *          Kleyton Gabriel  <kleyton_gabriel@hotmail.com>
 *          Victor Rodrigues <victor.rodrigues.oliveira@gmail.com> 
 * @file parkcar.cadastro.tipo_veiculos.php
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
	   
	   case 1: // Busca os Tipos de Veículos
	   
	   
	     if($_REQUEST["filtro"]){ // Filtra os dados por descrição do veículo.
		 
		     $campo=array($_REQUEST["filtro"].'%');
			 
			 $dados=$objDataset->smartset("select * from tb_tipo_veiculo where descricao like :v1",$campo);
			 
		 }else{
			 
			 $dados=$objDataset->smartset("select * from tb_tipo_veiculo");
			 
		 }
	   
	   	
		 	 
		 $objSmarty->assign("BUSCA",$dados);
		 $objSmarty->display("modulos/sistema/parkcar.busca.tipos_veiculo.tpl");	
		  
	   break;
	   
	   case 2: // Salvar Dados
	   
	   
	       if(empty($_REQUEST["id_veiculo"])){ // Variável  vazia insert; 
			   
			   
			   $sql="INSERT INTO tb_tipo_veiculo (descricao) VALUES (:v1)";
			   $dados=array(strtoupper($_REQUEST["descricao"]));
			   
			   
			   $exec=$objDataset->smartset($sql,$dados);
			   
			   
		   }else{ //Variável preenchida  update 
			   
			    
			   $sql="UPDATE tb_tipo_veiculo SET descricao = :v1 WHERE id_veiculo = :v2";
			   $dados=array(strtoupper($_REQUEST["descricao"]),$_REQUEST["id_veiculo"]);
			   
			   $exec=$objDataset->smartset($sql,$dados);
		   }
	   
	        
			   print_r($exec); // Retorna Execução se valor retornado = 1 - Transação Realizada  senão  Retorna Mensagem de Erro

	   
	   break;
	   
	   
	   case 3: // Deletar Dados
	   
	          $sql="DELETE FROM tb_tipo_veiculo where id_veiculo = :v1";
			  $dados=array($_REQUEST["id_veiculo"]);
	          $exec=$objDataset->smartset($sql,$dados);
			  
			  print_r($exec); // Retorna Execução se valor retornado = 1 - Transação Realizada  senão  Retorna Mensagem de Erro
	   
	   break;
	   
	   default:  // Retorna View da Tela
	   	   
	     $objSmarty->display("modulos/sistema/parkcar.cadastro.tipo_veiculos.tpl");	
	   
	   break;
	   
   }
    
 
   
?>
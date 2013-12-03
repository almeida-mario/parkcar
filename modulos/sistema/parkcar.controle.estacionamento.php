<?php
/**
 * @author  Mário Almeida    <prog.almeida@gmail.com>
 *          Kleyton Gabriel  <kleyton_gabriel@hotmail.com>
 *          Victor Rodrigues <victor.rodrigues.oliveira@gmail.com> 
 * @file parkcar.controle.estacionamento.php
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
	
	/*Função para Cálculo de Hora*/
	
	function SubHora($hora1,$hora2){

	$hora1 = explode(":",$hora1);
	$hora2 = explode(":",$hora2);
	$acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
	$acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
	$resultado = $acumulador2 - $acumulador1;
	$H=round(($resultado/3600),4);
	$h=explode('.',$H);
	$M='0'.'.'.$h[1];
	$h=$h[0];
	$m=$M*60;
	$m=explode('.',$m);
	$s='0'.'.'.$m[1];
	$s=round($s*60);
	$m=$m[0];	
	if($h<=0) $h=$h*(-1);
    if($h>=0 && $h<=9) $h='0'.$h;
	if($m>=0 && $m<=9) $m='0'.$m;
	if($s>=0 && $s<=9) $s='0'.$s;
	
	$resposta=$h.':'.$m.':'.$s;
	
	return $resposta;
   }
          
   
   
   
   switch($case){
	   
	   case 1: // Busca os carros Estacionados sem saída marcada
	   
	   
	     if($_REQUEST["filtro"]){ // Filtra os dados pela placa;
		 
		     $campo=array($_REQUEST["filtro"].'%');
			 
			 $dados=$objDataset->smartset("SELECT placa,data_registro,tipo_veiculo,tb_tipo_veiculo.descricao,cor,horario_entrada
			                                ,id_preco,tb_preco.descricao as tabela
											FROM tb_estacionamento
												 INNER JOIN tb_preco
													ON tb_estacionamento.tipo_preco = tb_preco.id_preco
												 INNER JOIN tb_tipo_veiculo
													ON tb_estacionamento.tipo_veiculo = tb_tipo_veiculo.id_veiculo
										   WHERE horario_saida IS NULL and placa like :v1",$campo);
			 
		 }else{
			 
			 $dados=$objDataset->smartset("SELECT placa,data_registro,tipo_veiculo,tb_tipo_veiculo.descricao,cor,horario_entrada
			                                ,id_preco,tb_preco.descricao as tabela
											FROM tb_estacionamento
												 INNER JOIN tb_preco
													ON tb_estacionamento.tipo_preco = tb_preco.id_preco
												 INNER JOIN tb_tipo_veiculo
													ON tb_estacionamento.tipo_veiculo = tb_tipo_veiculo.id_veiculo
										   WHERE horario_saida IS NULL");
			 
		 }
	   
	   	
		 	 
		 $objSmarty->assign("BUSCA",$dados);
		 $objSmarty->display("modulos/sistema/parkcar.busca.estacionamento.tpl");	
		  
	   break;
	   
	   case 2: // Salvar Dados
	   
	   
	        $verifica=$objDataset->smartset("select count(*) existe	 from tb_estacionamento where placa= :v1 and  horario_saida IS NULL ",array(strtoupper($_REQUEST["placa"])));
			  
	   
	       if($verifica["EXISTE"][0]==0){ // Variável  vazia insert; 
			   			   
			   $sql="INSERT INTO tb_estacionamento(placa,
                                      data_registro,
                                      tipo_veiculo,
                                      cor,
                                      tipo_preco,
                                      horario_entrada,
                                      log,
                                      log_data)
						VALUES (:v1,
								:v2,
								:v3,
								:v4,
								:v5,
								:v6,
								:v7,
								:v8)";
								
			   $dados=array(strtoupper($_REQUEST["placa"]),date("Y-m-d"),$_REQUEST["sl_veiculo"],strtoupper($_REQUEST["cor"]),$_REQUEST["sl_preco"],date("H:i:s"),$log_user,$log_data); 
			  
			   
			   
			   $exec=$objDataset->smartset($sql,$dados);
			  	   
		   }else if(!empty($_REQUEST["hora_sai"])){ //Variável preenchida  update 
			   
			   
			   
			   $sql="UPDATE tb_estacionamento
					   SET horario_saida = :v1,
						   valor_pago = :v2,
						   log = :v3,
						   log_data = :v4
					 WHERE placa = :v5 AND data_registro = :v6";
					 
			   $temp=explode("/",$_REQUEST["data_estacionamento"]);	 
			   $data_est=$temp[2].'-'.$temp[1].'-'.$temp[0];		 
					 
			   $dados=array($_REQUEST["hora_sai"],$_REQUEST["valor"],$log_user,$log_data,$_REQUEST["placa"],$data_est);
			   
			   $exec=$objDataset->smartset($sql,$dados);
		
			   
		   }
	   
	          
	        
			   print_r($exec); // Retorna Execução se valor retornado = 1 - Transação Realizada  senão  Retorna Mensagem de Erro

	   
	   break;
	   
	   
	   case 3: // Deletar Dados
	   
	          $sql="DELETE FROM tb_estacionamento where placa = :v1 AND data_registro = :v2";
			  $temp=explode("/",$_REQUEST["data_estacionamento"]);	 
			  $data_est=$temp[2].'-'.$temp[1].'-'.$temp[0];
			  $dados=array($_REQUEST["id_preco"],$data_est);
			  
	          $exec=$objDataset->smartset($sql,$dados);
			  
			  print_r($exec); // Retorna Execução se valor retornado = 1 - Transação Realizada  senão  Retorna Mensagem de Erro
	   
	   break;
	   
	   case 4: // Calcular valor do estacionamento;
	      
		  $hora_entrada = ($_REQUEST["hora_ent"]);
		  $hora_saida=date('H:i:s');
		  $sql="select * from tb_preco where id_preco=:v1";
		  $dados=array($_REQUEST["tipo_preco"]);
		  $precos=$objDataset->smartset($sql,$dados);
		  
		  //$tempo=$objDataset->smartset("select TIMEDIFF(:v2,:v1) as tempo",array($_REQUEST["hora_ent"],$hora_saida)); 
		  
		  	  
		  
		  $tempo_final=SubHora($hora_saida,$hora_entrada);
		  
		  $temp=explode(":",$tempo_final);
		  
		  
		  if($temp[0]>1){ // Calculo de Horas;
			  
			  $total +=$precos["VALOR_ADCIONAL_HORA"][0]*($temp[0]-1)+$precos["VALOR_HORA"][0]; 
			  
		  }else if($temp[0]==1){
			  
			 $total+=$precos["VALOR_HORA"][0]; 
		  }
		  
		  
		  if($temp[1]>0){ // Calcula Tempo pelos Minutos;
			  
			 $total +=($temp[1]/15)*$precos["VALOR_ADCIONAL_FRACAO"][0]; 
			  
		  }
		  
		  
		  $total=number_format($total,2,"."," ");
		
		  
		  print_r('1'.';'.$hora_saida.';'.$tempo_final.';'.$total);
		      
	   
	   break;
	   
	   default:  // Retorna View da Tela
	   
	     $tipo_veiculos=$objDataset->smartset("select * from tb_tipo_veiculo"); 
		 $precos=$objDataset->smartset("select * from tb_preco");
		 
		  
		 $objSmarty->assign("PRECOS",$precos); 
	   	 $objSmarty->assign("VEICULOS",$tipo_veiculos);  
	     $objSmarty->display("modulos/sistema/parkcar.controle.estacionamento.tpl");	
	   
	   break;
	   
   }
    
 
   
?>
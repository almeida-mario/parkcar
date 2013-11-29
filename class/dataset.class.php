<?php

/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file dataset.class.php 
 * @copyright 21/02/2013 - 14:08:07 
 */
class dataset extends PDO {

    var $sgbd = 1;   
    var $db_host = 'localhost';
    var $db_name = '';
    var $db_user = '';
    var $db_pass = '';
    var $db_persistent = true;
    var $erros = false;
    var $type =array();

    function __construct($dsn, $username, $passwd, $options) {
        parent::__construct($dsn, $username, $passwd, $options);
    }

    
    // Formatar data
   
    public function formatDate($data){
        
      $temp=  explode('-',$data);
      
      return $temp[2].'/'.$temp[1].'/'.$temp[0];
   
    }
    
    /* Função de manipulação de dados */

    public function smartset($sql, $valores = array(), $debug = '') {

        if ($debug == '') {

            return $this->retornaDados($this->execQuery($sql, $valores));
        } else {

            print_r($sql);
			print_r($valores);
			
        }
    }

    /* Executa Query */

    public function execQuery($sql, $bind = array()) {

        $this->beginTransaction();
        $dados = $this->prepare($sql);
        		
        for ($a = 0; $a < count($bind); ++$a) {

            $dados->bindParam(':v' . ($a + 1), $bind[$a]);
        }

        $dados->execute();
        $erro = $dados->errorInfo();
        $dados->columnCount();

        $this->type=array();        

        // verifica o tipo dos dados da tabela;
        
    
        for($a=0 ;$a < $dados->columnCount();++$a){
           
            $campo=$dados->getColumnMeta($a);
              
            $this->type["TIPO"][]=$campo["native_type"];
            $this->type["CAMPO"][]=$campo["name"];
                
        }
        
      
        $temp = explode(' ', strtolower($sql));

        if ($erro[2]) {

            $this->rollBack();
            $this->erros = true;
            return $erro[2];
        } elseif ($temp[0] == 'select') {
            
            $this->commit();
            
            return $dados->fetchAll(PDO::FETCH_ASSOC);
            
        } else {

            $this->commit();
            return 1;
        }
    }

    /* Retorna os Dados Tratados */

    public function retornaDados($dados) {

        $retorno = array();

        if ($this->erros == true || $dados == 1)
            return $dados;

        for ($a = 0; $a < count($dados); ++$a) {

            $chave = array_keys($dados[$a]);
            $valores = array_values($dados[$a]);

            for ($b = 0; $b < count($chave); ++$b) {

                
                if($this->type["TIPO"][$b]=='DATE'){
                    
                    $valores[$b] = $this->formatDate($valores[$b]);
                             
                }
                
                
                
                $retorno[strtoupper($chave[$b])][] = $valores[$b];
            }
        }

        return $retorno;
    }

}

?>

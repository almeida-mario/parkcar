<?php

/**
 * @author  Mário Almeida  <prog.almeida@gmail.com>
 * @file sistema.class.php
 * @copyright 01/03/2013 - 08:21:01
 */
class sistema extends dataset {

    private $idUsuario;
    public $debug;
 
 
    //Construtor da Classe
	
    function __construct($dsn, $username, $passwd, $options) {
        parent::__construct($dsn, $username, $passwd, $options);
    }

    //Buscar IdUsuario;
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    //Set IdUsuario;
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    //Verifica se existe usuário loga no sistema;
    public function logarUser($login, $senha) {

        $senha = base64_encode($senha);

        return $this->smartset("select user_id,count(*) existe from tb_usuario where tb_usuario.login=:v1 and tb_usuario.senha=:v2", array($login, $senha), $this->debug);
    }

    //Seleconar os Dados do Usuário;
    public function dadosUser() {

        return $this->smartset("select * from tb_usuario where user_id = :v1", array($this->idUsuario), $this->debug);
    }

    
}

?>

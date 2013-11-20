<?php

/**
 * @author  M�rio Almeida  <prog.almeida@gmail.com> 
 * @file sessao.class.php 
 * @copyright 17/04/2013 - 10:40:54 
 */
class sessao extends sistema {

    function __construct($dsn, $username, $passwd, $options) {

        parent::__construct($dsn, $username, $passwd, $options);

          session_start();

        if (!isset($_SESSION['SISTEMAWEB'])) {
            header("Location: /parkcar/index.php?msg=sessaoexp");
            exit;
        }
    }

    public function montaSessao() {

        $this->setIdUsuario($_SESSION["SISTEMAWEB"]["DADOS"]["IDUSUARIO"][0]);

        // Dados do Cliente;
        $_SESSION["SISTEMAWEB"]["DADOS"] = $this->dadosUser();
        // M�dulos do Usu�rio;
        $_SESSION["SISTEMAWEB"]["MODULOS"] = $this->modulos();
        // Permiss�es do Usu�rio;
        $_SESSION["SISTEMAWEB"]["PERMISSOES"] = $this->permissoes();
        // Menus do Usu�rio
        $_SESSION["SISTEMAWEB"]["MENUS"] = $this->menus();
    }
    
}

?>

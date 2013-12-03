<?php

/**
 * @author  Mário Almeida    <prog.almeida@gmail.com>
 *          Kleyton Gabriel  <kleyton_gabriel@hotmail.com>
 *          Victor Rodrigues <victor.rodrigues.oliveira@gmail.com> 
 * @file sessao.class.php 
 * @copyright 2013
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

        $this->setIdUsuario($_SESSION["SISTEMAWEB"]["DADOS"]["USER_ID"][0]);

        // Dados do Cliente;
        $_SESSION["SISTEMAWEB"]["DADOS"] = $this->dadosUser();

    }
    
}

?>

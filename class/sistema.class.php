<?php

/**
 * @author  Mário Almeida  <prog.almeida@gmail.com>
 * @file sistema.class.php
 * @copyright 01/03/2013 - 08:21:01
 */
class sistema extends dataset {

    private $idUsuario;
    public $debug;

    function __construct($dsn, $username, $passwd, $options) {
        parent::__construct($dsn, $username, $passwd, $options);
    }

    // Função para calcular a diferença entre os dias;

    public function calcula_dias($inicial, $final) {
        list($dia_inicial, $mes_inicial, $ano_inicial) = explode("/", $inicial);
        list($dia_final, $mes_final, $ano_final) = explode("/", $final);
        $inicial2 = mktime(0, 0, 0, $mes_inicial, $dia_inicial, $ano_inicial);
        $final2 = mktime(0, 0, 0, $mes_final, $dia_final, $ano_final);
        $dias = ($final2 - $inicial2) / 86400;
        return round($dias);
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function logarUser($login, $senha) {

        $senha = md5($senha);

        return $this->smartset("select idusuario,count(*) existe from usuarios where usuarios.login=:v1 and usuarios.senha=:v2", array($login, $senha), $this->debug);
    }

    public function dadosUser() {

        return $this->smartset("select * from usuarios where idusuario = :v1", array($this->idUsuario), $this->debug);
    }

    // Busca Módulos;

    public function modulos() {

        return $this->smartset("SELECT DISTINCT modulos.idmodulo,modulos.mod_nome,modulos.mod_src,modulos.mod_img FROM modulos INNER JOIN permissoes ON modulos.idmodulo = permissoes.idmodulo WHERE permissoes.idusuario = :v1 order by idmodulo", array($this->idUsuario), $this->debug);
    }

    // Busca Permissões;

    public function permissoes() {


        return $this->smartset("SELECT permissoes.idpermissao,
                                 permissoes.idusuario,
                                 permissoes.idaplicacao,
                                 aplicacoes.aplic_nome_menu,
                                 CONCAT(modulos.mod_src, aplicacoes.aplic_nome_src) AS src,
                                 aplicacoes.img_class,
                                 permissoes.idmodulo,
                                 permissoes.idmenu,
                                 permissoes.cadastrar,
                                 permissoes.alterar,
                                 permissoes.excluir,
                                 aplicacoes.flag
                        FROM permissoes
                                 INNER JOIN aplicacoes
                                        ON permissoes.idaplicacao = aplicacoes.idaplicacao
                                 INNER JOIN modulos
                                        ON aplicacoes.idmodulo = modulos.idmodulo
                   WHERE permissoes.idusuario = :v1
                  ORDER BY permissoes.idaplicacao,aplicacoes.aplic_nome_menu", array($this->idUsuario), $this->debug);
    }

    // Busca Menus;

    public function menus() {


        return $this->smartset("SELECT DISTINCT permissoes.idmodulo,
                                                permissoes.idmenu,
                                                menus.menu_nome,
                                                menus.img_class,
                                                menus.menu_ordem
                    FROM permissoes INNER JOIN menus ON permissoes.idmenu = menus.idmenu
                    WHERE permissoes.idusuario = :v1
                    ORDER BY menus.menu_ordem", array($this->idUsuario), $this->debug);
    }

    // Informações da url

    public function infoUrl($url) {

        return $this->smartset("SELECT aplic_nome_menu,modulos.idmodulo,
                                       mod_nome,
                                       cadastrar,
                                       alterar,
                                       excluir
                              FROM aplicacoes
                                       INNER JOIN modulos
                                              ON aplicacoes.idmodulo = modulos.idmodulo
                                       INNER JOIN permissoes
                                              ON     aplicacoes.idaplicacao = permissoes.idaplicacao
                                                     AND permissoes.idusuario = :v1
                             WHERE aplic_nome_src = :v2", array($this->idUsuario, $url), $this->debug);
    }

}

?>

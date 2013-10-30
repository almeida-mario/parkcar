<?php

/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file controle.php 
 * @copyright 17/04/2013 - 09:03:14 
 */

require_once ('../configs/config.inc.php');

$objSessao = new sessao(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
$objSistema = new sistema(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));

$user = strtolower($_SESSION['SISTEMAWEB']['DADOS']['NOME'][0]);
$user = explode(' ', $user);

$objSmarty->assign('USER', ucwords($user[0] . ' ' . $user[count($user) - 1]));

// Usuário de Log do Sistema

$log_user = $_SESSION['SISTEMAWEB']['DADOS']['LOGIN'][0];
$log_data = date('d/m/Y H:m:s');

// Capturar URL do Programa; 

$url = $_SERVER['PHP_SELF'];
$length = strlen($url);
$posicao = strpos($url, 'cantina.', 5);
$url = substr($url, $posicao, $length);

$objSistema->setIdUsuario($_SESSION["SISTEMAWEB"]["DADOS"]["IDUSUARIO"][0]);
$dadospager = $objSistema->infoUrl($url);


echo"<pre>";print_r($_SESSION["SISTEMAWEB"]["PERMISSOES"]);


$perms_salvar = $dadosPager["CADASTRAR"][0];
$perms_alterar = $dadosPager["ALTERAR"][0];
$perms_excluir = $dadosPager["EXCLUIR"][0];


$objSmarty->assign("KEYMODULO", $dadosPager["IDMODULO"][0]);
$objSmarty->assign('MODULOS', $_SESSION["SISTEMAWEB"]["MODULOS"]);
$objSmarty->assign('MENUS', $_SESSION["SISTEMAWEB"]["MENUS"]);
$objSmarty->assign('PERMISSOES', $_SESSION["SISTEMAWEB"]["PERMISSOES"]);


?>
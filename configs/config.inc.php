<?php

/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file config.inc.php 
 * @copyright 21/02/2013 - 08:24:03 
 */
/**
 * define shorthand directory separator constant
 */

// define o caminho absoluto do site

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('APP_ROOT')) {
    
    define("APP_ROOT",str_replace('/parkcar','',$_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', $_SERVER['PHP_SELF']), 0, -2)) . DS . 'parkcar' . DS));

}


if(!defined('APP_URL')){
    
    define("APP_URL", "http://" . $_SERVER["HTTP_HOST"] . "/parkcar/");
    
}

require_once(str_replace('/parkcar','',APP_ROOT).'library'.DS.'smarty'.DS.'Smarty.class.php');

require_once (str_replace('/parkcar','',APP_ROOT).'configs'.DS.'autoloader.php');

/* Inicia as configurações do smarty tamplates */

$objSmarty = new Smarty;
$objSmarty->setCompileDir(APP_ROOT . 'cache' . DS . 'templates_c');
$objSmarty->setTemplateDir(APP_ROOT . 'templates');
$objSmarty->setCacheDir(APP_ROOT . 'cache');

define("SISTEMA","ParkCar - Controle de Acesso de Veículos");
define("CSS", APP_URL . 'css/');
define("JS", APP_URL . 'js/');
define("IMG", APP_URL . 'img/');
define("JQUERY", APP_URL . 'library/jquery/');

/* Definições Banco de dados */

//mysql=1 ; postgresql=2 ; oracle =3; 

$sgbd = 1;
define("DB_NAME", "parkcar");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "7777");
define('DB_PERSISTENT', TRUE);


switch ($sgbd) {
    case 1: // mysql;

        define("DB_DNS", 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME);

        break;

    case 2: // postgresql;

        define("DB_DNS", 'pgsql:host=' . DB_HOST . ';port=5432;dbname=' . DB_NAME);

        break;

    case 3: // oracle

        define("DB_DNS", 'oci:dbname=' . DB_HOST);

    default:

        define("DB_DNS", 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME);

        break;
}

  //$objDataset = new dataset(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));
?>
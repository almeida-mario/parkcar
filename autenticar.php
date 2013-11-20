<?php

/**
 * @author  M�rio Almeida  <prog.almeida@gmail.com> 
 * @file autenticar.php 
 * @copyright 01/03/2013 - 08:19:05 
 */
require_once ('configs/config.inc.php');

$objSistema = new sistema(DB_DNS, DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => DB_PERSISTENT));

// inicia a sess�o de dados;


$nologin = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">

<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
	<meta http-equiv=\"Cache-Control\" content=\"no-cache, no-store\" />
	<meta http-equiv=\"Pragma\" content=\"no-cache, no-store\" />
	<meta http-equiv=\"refresh\" content=\"2;URL=/parkcar/index.php\" />
	
	<title>" . SISTEMA . " &copy; - Carregando Sistema...</title>
	
	<link rel=\"shortcut icon\" href=\"img/favicon.ico\" align=\"absmiddle\" />
	
	<style>
	
	body {
		font-family: \"Tahoma\"; 
		font-size: 20px;
		font-weight: 700;
		color: #555;
		background: url('img/login_bg.png') repeat-x #CCC;
	}
		
	</style>
</head>
	<body>
		<p>
			<b>Usu�rio ou senha incorretos!!!</b> 
		</p>
	</body>
</html>";


$screen = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">

<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
	<meta http-equiv=\"Cache-Control\" content=\"no-cache, no-store\" />
	<meta http-equiv=\"Pragma\" content=\"no-cache, no-store\" />
	<meta http-equiv=\"refresh\" content=\"2;URL=/parkcar/modulos/parkcar.controle.php\" />
	
	<title>" . SISTEMA . " &copy; - Carregando Sistema...</title>
	
	<link rel=\"shortcut icon\" href=\"img/favicon.ico\" align=\"absmiddle\" />
	
	<style>
	
	body {
		font-family: \"Tahoma\"; 
		font-size: 20px;
		font-weight: 700;
		color: #555;
		background: url('img/login_bg.png') repeat-x #CCC;
	}
		
	</style>
</head>
	<body>
		<p>
			<b>Carregando Sistema...</b> <img src=\"img/carregando.gif\" />
		</p>
	</body>
</html>";

session_cache_expire(30); // 30 minutos;
session_start();


if (!isset($SESSION['SISTEMAWEB'])) {

    $logar = $objSistema->logarUser($_POST["usuario"], $_POST["senha"]);
	
	
	if ($logar["EXISTE"][0] != 1) {

        echo $nologin;
        exit;
    }

    $objSistema->setIdUsuario($logar["USER_ID"][0]);
    $dados = $objSistema->dadosUser();
	
	
    // Dados do Cliente;
    $_SESSION["SISTEMAWEB"]["DADOS"] = $dados;

    echo $screen;
      
} else {

    echo $nologin;

    
}
?>

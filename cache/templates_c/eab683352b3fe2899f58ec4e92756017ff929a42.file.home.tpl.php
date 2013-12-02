<?php /* Smarty version Smarty-3.1.13, created on 2013-12-01 00:48:53
         compiled from "C:\xampp\htdocs\parkcar\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9262528ba25df03110-01499358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eab683352b3fe2899f58ec4e92756017ff929a42' => 
    array (
      0 => 'C:\\xampp\\htdocs\\parkcar\\templates\\home.tpl',
      1 => 1385853928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9262528ba25df03110-01499358',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528ba25df3cdd5_13001322',
  'variables' => 
  array (
    'USER' => 0,
    'URL1' => 0,
    'URL2' => 0,
    'URL3' => 0,
    'URL4' => 0,
    'URL5' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528ba25df3cdd5_13001322')) {function content_528ba25df3cdd5_13001322($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo @constant('SISTEMA');?>
</title>
<link rel="shortcut icon" href="<?php echo @constant('IMG');?>
favicon.ico" />
<link href="<?php echo @constant('CSS');?>
style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo @constant('JQUERY');?>
css/parkcar/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo @constant('JQUERY');?>
js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo @constant('JQUERY');?>
js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" src="<?php echo @constant('JS');?>
login.js"></script>
<script type="text/javascript" src="<?php echo @constant('JS');?>
sistema.js"></script>
</head>
<body >
<div id="barra">
  <div id="logo"><img src="<?php echo @constant('IMG');?>
logo.png" height="100px" style="margin-left:70px" /></div>
  <div id="titulo">ParkCar- Home Sistema</div>
  <div id="status">USUÁRIO  : <?php echo $_smarty_tpl->tpl_vars['USER']->value;?>

    <div class="loggof" style="float:right;"></br>
      <a href="../sair.php" >Fazer loggof</a> </div>
  </div>
<!--  <div id="menu">
    <ul>
      <li><a href="index.html">In&iacute;cio</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Usu&aacute;rios</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">M&oacute;dulos</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Menus</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Permiss&otilde;es</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Aplicativos</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Fun&ccedil;&otilde;es</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Empresas</a></li>
    </ul>
  </div>
</div>-->
<!--barra--> 

<br />
<div class="layout">
  <div class="page">
      
        <div class="thumb" > <a href="parkcar.controle.php?url=<?php echo $_smarty_tpl->tpl_vars['URL1']->value;?>
"><img class="icone" src="<?php echo @constant('IMG');?>
configuracao.png" /></br>Cadastro - Usuários  </a> </div>
        <div class="thumb" > <a href="parkcar.controle.php?url=<?php echo $_smarty_tpl->tpl_vars['URL2']->value;?>
"><img class="icone" src="<?php echo @constant('IMG');?>
preco.png" /></br>Cadastro - Tabela de Preços</a> </div>
        <div class="thumb" > <a href="parkcar.controle.php?url=<?php echo $_smarty_tpl->tpl_vars['URL3']->value;?>
"><img class="icone" src="<?php echo @constant('IMG');?>
veiculos.png" /></br>Cadastro - Tipos de Veículos</a> </div>
        <div class="thumb" > <a href="parkcar.controle.php?url=<?php echo $_smarty_tpl->tpl_vars['URL4']->value;?>
"><img class="icone" src="<?php echo @constant('IMG');?>
estacionamento.png" /></br>Controlar Estacionamento</a> </div>
        <div class="thumb" > <a href="parkcar.controle.php?url=<?php echo $_smarty_tpl->tpl_vars['URL5']->value;?>
"><img class="icone" src="<?php echo @constant('IMG');?>
relatorio.png" /></br>Relatórios</a></div>
     
       
  </div>
  
</div>

    <div id="footer">
      <div class="suporte"> <a href="mailto:prog.almeida@gmail.com">FALAR COM O SUPORTE</a> </div>
      <!--suporte--> 
      <?php echo @constant('SISTEMA');?>
</br>
      Direitos Reservados &copy;2013 
    </div>
    <!--footer--> 
</body>
</html>
<?php }} ?>
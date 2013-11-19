<?php /* Smarty version Smarty-3.1.13, created on 2013-11-19 17:36:44
         compiled from "C:\xampp\htdocs\parkcar\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9262528ba25df03110-01499358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eab683352b3fe2899f58ec4e92756017ff929a42' => 
    array (
      0 => 'C:\\xampp\\htdocs\\parkcar\\templates\\home.tpl',
      1 => 1384896993,
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
    'MODULOS' => 0,
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
<script>
$(document).ready(function() {

});


 function icon(id){
   
    alert(id);	 
	 
 }
 
</script>
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
  
  
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['MODULOS']->value['IDMODULO']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['a']['total']);
?>
    
        <div class="thumb" > <a href="ocorrencia.html"><img class="icone" src="<?php echo @constant('IMG');?>
ocorrencias.png" /></br><?php echo $_smarty_tpl->tpl_vars['MODULOS']->value['IDMODULO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
 - <?php echo $_smarty_tpl->tpl_vars['MODULOS']->value['MOD_NOME'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
  </a> </div>
    
    <?php endfor; endif; ?>
  
    
       
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
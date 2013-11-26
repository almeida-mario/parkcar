<?php /* Smarty version Smarty-3.1.13, created on 2013-11-26 17:10:03
         compiled from "C:\xampp\htdocs\parkcar\templates\modulos\sistema\parkcar.cadastro.usuarios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30267528e6a24c9f105-32122408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85530cd516d1e34db92540fe353412c2e61e0656' => 
    array (
      0 => 'C:\\xampp\\htdocs\\parkcar\\templates\\modulos\\sistema\\parkcar.cadastro.usuarios.tpl',
      1 => 1385500201,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30267528e6a24c9f105-32122408',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528e6a24cda2d9_06415251',
  'variables' => 
  array (
    'USER' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528e6a24cda2d9_06415251')) {function content_528e6a24cda2d9_06415251($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
sistema.js"></script>
<script type="text/javascript" src="<?php echo @constant('JS');?>
parkcar.cadastro.usuarios.js"></script>


</head>
<body >
<div id="barra">
  <div id="logo"><a href="../modulos/parkcar.controle.php"><img src="<?php echo @constant('IMG');?>
logo.png" height="100px" style="margin-left:70px" /></a></div>
  <div id="titulo"><?php echo @constant('SISTEMA');?>
</div>
  <div id="status">USUÁRIO  : <?php echo $_smarty_tpl->tpl_vars['USER']->value;?>

    <div class="loggof" style="float:right;"></br>
      <a href="../sair.php" >Fazer loggof</a> </div>
  </div>
  <div id="menu">
    <ul>
      <li><a href="../modulos/parkcar.controle.php">Home do Usuário</a></li>
      <li>&bull;</li>
    </ul>
  </div>
</div>
<!--barra--> 
<br />
<div class="layout">
  <div class="page"> <br />
    <br />
    <form id="frm_usuario"  style="height:400px; border:1px solid;width:100%; margin-left:-11px">
      <h2 class="ui-widget-header" style="height:25px;text-align:center">Cadastro de Usuários</h2>
      <div class="formSistema">
        <h3 style="margin-left:15px;font-weight:bold">Informações Pessoais</h3>
        <div class="field">
          <input id="id_user" name="id_user" type="hidden" />
          <label class="rotulo">Nome Completo:</label>
          <input id="nome_user" name="nome_user" type="text" alt="obrigatorio"class="campo" size="90" />
        </div>
        <div class="field">
          <label class="rotulo">Login:</label>
          <input id="login_user" name="login_user" type="text" alt="obrigatorio"  class="campo" size="55" />
        </div>
        <div class="field">
          <label class="rotulo">Senha:</label>
          <input id="senha_user" name="senha_user" type="password" alt="obrigatorio"  class="campo" size="55" />
        </div>
      </div>
      <!--formSistema-->
      
      <div class="btForm">
        <button id="bt_salva" type="button">SALVAR</button>
        &nbsp;
        <button id="bt_new"  type="reset">LIMPAR</button>
        &nbsp;
        <button id="bt_del" type="button">EXCLUIR</button>
        &nbsp;
        <button id="bt_pesq" type="button">PESQUISAR</button>
      </div>
      <!--btForm-->
    </form>
  </div>
  <div id="dlg_usuarios" title="Lista de Usuários do Sistema">
    <form id="frm_lista" style=" height:300px" onsubmit="return false">
      Nome Completo:&nbsp;&nbsp;
      <input id="nome_user" type="text" alt="obrigatorio"class="campo" size="60" />
      <br />
      <br />
      <fieldset style="display:block; margin:15px auto 0px auto; width:98%; height:200px">
        <legend>LISTAGEM</legend>
        <table cellpadding="0" cellspacing="0" border="0"  width="100%" style="table-layout:fixed;text-align:center">
          <tr class="ui-state-hover" height="20px">
            <td width="25%">ID USUÁRIO</td>
            <td>NOME COMPLETO</td>
          </tr>
        </table>
        <div id="result_lista" class="resultado"; style="display:block; height:164px"></div>
      </fieldset>
    </form>
  </div>
</div>
<div id="footer">
  <div class="suporte"> <a href="mailto:prog.almeida@gmail.com">FALAR COM O SUPORTE</a> </div>
  <!--suporte--> 
  <?php echo @constant('SISTEMA');?>
</br>
  Direitos Reservados &copy;2013 </div>
<!--footer-->
</body>
</html>
<?php }} ?>
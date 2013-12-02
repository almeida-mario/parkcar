<?php /* Smarty version Smarty-3.1.13, created on 2013-12-02 08:55:57
         compiled from "C:\xampp\htdocs\parkcar\templates\modulos\sistema\parkcar.cadastro.precos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15476529a98201f2a37-55174384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd21abdc8b9f9781e8918b13635991bdd398bfa03' => 
    array (
      0 => 'C:\\xampp\\htdocs\\parkcar\\templates\\modulos\\sistema\\parkcar.cadastro.precos.tpl',
      1 => 1385985281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15476529a98201f2a37-55174384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529a98202b1137_61166129',
  'variables' => 
  array (
    'USER' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529a98202b1137_61166129')) {function content_529a98202b1137_61166129($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
parkcar.cadastro.precos.js"></script>
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
    <form id="frm_preco"  style="height:450px; border:1px solid;width:100%; margin-left:-11px">
      <h2 class="ui-widget-header" style="height:25px;text-align:center">Cadastro de Preços</h2>
      <div class="formSistema">
        <h3 style="margin-left:15px;font-weight:bold">Dados Preços</h3>
        <div class="field">
          <input id="id_preco" name="id_preco" type="hidden" />
          <label class="rotulo">Descrição Preço:</label>
          <input id="descricao" name="descricao" style="text-transform:uppercase" type="text" alt="obrigatorio" title="Campo Obrigatório." class="campo" size="90" />
        </div>
         <div style="width:500px">
         <div class="field" style="width:150px; text-align:left;">
          <label class="rotulo">Valor Hora:</label>
          <input id="vlr_hora" name="vlr_hora" style="text-transform:uppercase; margin-left:5px" type="text" alt="obrigatorio" title="Campo Obrigatório." class="campo" size="15" />
        </div>
        
         <div class="field" style="width:150px; text-align:left">
          <label class="rotulo">Valor Adicional Hora:</label>
          <input id="vlr_ad_hora" name="vlr_ad_hora" style="text-transform:uppercase; margin-left:5px" type="text" alt="obrigatorio" title="Campo Obrigatório." class="campo" size="15" />
        </div>
        
         <div class="field" style="width:150px; text-align:left ">
          <label class="rotulo">Valor Adicional Fração:</label>
          <input id="vlr_ad_fracao" name="vlr_ad_fracao" style="text-transform:uppercase; margin-left:5px" type="text" alt="obrigatorio" title="Campo Obrigatório." class="campo" size="15" />
        </div>
      
       </div>  
        
         
      </div>
      <!--formSistema-->
      
       <fieldset style="display:block; margin:15px auto 0px auto; width:95%; height:150px">
        <legend>LISTAGEM</legend>
        <table cellpadding="0" cellspacing="0" border="0"  width="100%" style="table-layout:fixed;text-align:center; font-size:12px">
          <tr class="ui-state-hover" height="20px">
            <td width="15%">ID PREÇO</td>
            <td>DESCRIÇÃO</td>
            <td width="15%">HORA</td>
            <td width="15%">AD. HORA</td>
            <td width="15%">AD. FRAÇÃO</td>
          </tr>
        </table>
        <div id="result_lista" class="resultado"; style="display:block; height:110px"></div>
      </fieldset>
      
       
      <div class="btForm">
        <button id="bt_salva" type="button">SALVAR</button>
        &nbsp;
        <button id="bt_new"  type="reset">LIMPAR</button>
        &nbsp;
        <button id="bt_del" type="button">EXCLUIR</button>
      </div>
      <!--btForm-->
    </form>
  </div>
 
  <!--Inclusão da Div das mensagens de Erro Padrão do Sistema--> 
  
  <?php echo $_smarty_tpl->getSubTemplate ("includes/msgDlg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 </div>
  <div id="footer">
  <div class="suporte"> <a href="mailto:prog.almeida@gmail.com">FALAR COM O SUPORTE</a> </div>
  <!--suporte--> 
  <?php echo @constant('SISTEMA');?>
</br>
  Direitos Reservados &copy;2013 </div>
<!--footer-->
</body>
</html><?php }} ?>
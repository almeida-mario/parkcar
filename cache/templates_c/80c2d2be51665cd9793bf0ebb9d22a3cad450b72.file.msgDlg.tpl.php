<?php /* Smarty version Smarty-3.1.13, created on 2013-12-02 08:54:56
         compiled from "C:\xampp\htdocs\parkcar\templates\includes\msgDlg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53775299caa3020ad2-88462699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80c2d2be51665cd9793bf0ebb9d22a3cad450b72' => 
    array (
      0 => 'C:\\xampp\\htdocs\\parkcar\\templates\\includes\\msgDlg.tpl',
      1 => 1385985281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53775299caa3020ad2-88462699',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5299caa303a8d1_33547816',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5299caa303a8d1_33547816')) {function content_5299caa303a8d1_33547816($_smarty_tpl) {?>
<div id='msg_dlg_alerta' title="Resultado de Operacao" style='display:none;heigth=200px;margin-left:15px;'> <img src="<?php echo @constant('IMG');?>
icones/icon_alerta.png" border="0" align="absmiddle" style="float:left;margin-top:25px"/>
  <textarea rows="10" cols="48" id="msg" name="msg"></textarea>
</div>
<div id='msg_dlg_ok' title="Resultado" style='display:none;heigth=200px'> <img src="<?php echo @constant('IMG');?>
icones/ok.png" border="0" align="absmiddle" style="float:left;margin-top:25px"/>
  <p id="msg_ok" style="font-weight:bold;text-align:center;font-size:14px;margin-top:30px"></p>
</div>
<div id='msg_dlg_processo' title="Resultado" style='display:none;heigth=200px'> <img src="<?php echo @constant('IMG');?>
icones/tempo.gif" border="0" align="absmiddle" style="float:left;margin-top:25px"/>
  <p id="msg_processo" style="font-weight:bold;text-align:center;font-size:14px;margin-top:30px"></p>
</div>
<div id='msg_dlg_decisao' title="Resultado" style='display:none;heigth=200px'> <img src="<?php echo @constant('IMG');?>
icones/decisao.png" border="0" align="absmiddle" style="float:left;margin-top:25px"/>
  <p id="msg_decisao" style="font-weight:bold;text-align:center;font-size:14px;margin-top:30px"></p>
</div>
<?php }} ?>
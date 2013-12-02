<?php /* Smarty version Smarty-3.1.13, created on 2013-12-02 08:57:14
         compiled from "C:\xampp\htdocs\parkcar\templates\modulos\sistema\parkcar.busca.tipos_veiculo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31815529a8c57cc5300-26923819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b483006de5e8baf3eae6de523321c53bc5084e82' => 
    array (
      0 => 'C:\\xampp\\htdocs\\parkcar\\templates\\modulos\\sistema\\parkcar.busca.tipos_veiculo.tpl',
      1 => 1385985281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31815529a8c57cc5300-26923819',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529a8c57db6690_01821073',
  'variables' => 
  array (
    'BUSCA' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529a8c57db6690_01821073')) {function content_529a8c57db6690_01821073($_smarty_tpl) {?>
<script>

var id_old
var id_tab 
var objeto_hist
var color_old


$(".z").click(function(){
    
	var	linha = $(this).attr("id");
	$(this).css({"background-color":"#FFCC33"});
    id_tab=linha;
		      
    var dados= linha.split(";");
	
        $('#id_veiculo').val(dados[0]);
		$('#descricao').val(dados[1]);
	
      		
		if (id_old!=linha)
		   {	
		    if(id_old!=null)
			 {
			 $(objeto_hist).css({"background-color":'#FFFFFF'});
			 }
		   }
		  
         id_old=linha;
		 objeto_hist=this;
		 
			
 });
 
  
function ativa($id)
 {
 
   color_old=document.getElementById($id).style.backgroundColor;
   document.getElementById($id).style.backgroundColor='#C2E0FE';

 }

function desativa($id)
 {

    document.getElementById($id).style.backgroundColor=color_old;
	if(id_tab == $id) { document.getElementById(id_tab).style.backgroundColor='#FFCC33'};

 } 
  
	
</script>	


<?php if ($_smarty_tpl->tpl_vars['BUSCA']->value){?>
<table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse:collapse;font-size:12px; table-layout:fixed">
 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['a'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['name'] = 'a';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['BUSCA']->value['ID_VEICULO']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
 <tr class="z"  id="<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['ID_VEICULO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
;<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['DESCRICAO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
" onMouseOver="ativa(this.id)" onMouseOut="desativa(this.id)"> 
  <td width="25%" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['ID_VEICULO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
</td>
  <td width="" style="text-align:left">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['DESCRICAO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
</td>
 </tr>
 <?php endfor; endif; ?> 
</table>
<?php }?><?php }} ?>
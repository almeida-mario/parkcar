<?php /* Smarty version Smarty-3.1.13, created on 2013-12-02 13:40:32
         compiled from "C:\xampp\htdocs\parkcar\templates\modulos\sistema\parkcar.busca.estacionamento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22407529bf8abc5c3d6-43093791%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '212624c582df4e5614b14834e1e6b90de840f303' => 
    array (
      0 => 'C:\\xampp\\htdocs\\parkcar\\templates\\modulos\\sistema\\parkcar.busca.estacionamento.tpl',
      1 => 1386006030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22407529bf8abc5c3d6-43093791',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_529bf8abe3ee11_18686327',
  'variables' => 
  array (
    'BUSCA' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529bf8abe3ee11_18686327')) {function content_529bf8abe3ee11_18686327($_smarty_tpl) {?>
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
	
        $('#placa').val(dados[0]);
		$('#sl_veiculo').val(dados[1]);
		$('#sl_preco').val(dados[2]);
		$('#cor').val(dados[3]);
		$('#hora_ent').val(dados[4]);
		$('#tabela').val(dados[5]);
		$('#tipo_preco').val(dados[6]);
		$('#valor').val('');
		$('#hora_sai').val('');
		$('#tempo').val('');
		$('#data_estacionamento').val(dados[7]);
		
		
	    $('#dlg_estacionamento').dialog("open");
      		
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
$_smarty_tpl->tpl_vars['smarty']->value['section']['a']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['BUSCA']->value['PLACA']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
 <tr class="z"  id="<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['PLACA'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
;<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['TIPO_VEICULO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
;<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['ID_PRECO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
;<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['COR'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
;<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['HORARIO_ENTRADA'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
;<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['TABELA'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
;<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['ID_PRECO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
;<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['DATA_REGISTRO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
" onMouseOver="ativa(this.id)" onMouseOut="desativa(this.id)"> 
  <td width="15%" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['PLACA'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
</td>
  <td width="" style="text-align:left">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['DESCRICAO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
</td>
   <td width="15%" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['DATA_REGISTRO'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
</td>
   <td width="15%" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['HORARIO_ENTRADA'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
</td>
   <td width="15%" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['BUSCA']->value['TABELA'][$_smarty_tpl->getVariable('smarty')->value['section']['a']['index']];?>
</td>
 </tr>
 <?php endfor; endif; ?> 
</table>
<?php }?><?php }} ?>
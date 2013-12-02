{literal}
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
{/literal}

{if $BUSCA}
<table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse:collapse;font-size:12px; table-layout:fixed">
 {section name=a loop=$BUSCA.PLACA}
 <tr class="z"  id="{$BUSCA.PLACA[a]};{$BUSCA.TIPO_VEICULO[a]};{$BUSCA.ID_PRECO[a]};{$BUSCA.COR[a]}" onMouseOver="ativa(this.id)" onMouseOut="desativa(this.id)"> 
  <td width="15%" style="text-align:center">{$BUSCA.PLACA[a]}</td>
  <td width="" style="text-align:left">&nbsp;&nbsp;{$BUSCA.DESCRICAO[a]}</td>
   <td width="15%" style="text-align:center">{$BUSCA.DATA_REGISTRO[a]}</td>
   <td width="15%" style="text-align:center">{$BUSCA.HORARIO_ENTRADA[a]}</td>
   <td width="15%" style="text-align:center">{$BUSCA.TABELA[a]}</td>
 </tr>
 {/section} 
</table>
{/if}
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
	
        $('#id_user').val(dados[0]);
		$('#nome_user').val(dados[1]);
		$('#login_user').val(dados[2]);
		$('#senha_user').val(dados[3]);
      		
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
 {section name=a loop=$BUSCA.USER_ID}
 <tr class="z"  id="{$BUSCA.USER_ID[a]};{$BUSCA.USER_NAME[a]};{$BUSCA.LOGIN[a]};{$BUSCA.SENHA[a]}" onMouseOver="ativa(this.id)" onMouseOut="desativa(this.id)"> 
  <td width="25%" style="text-align:center">{$BUSCA.USER_ID[a]}</td>
  <td width="" style="text-align:left">&nbsp;&nbsp;{$BUSCA.USER_NAME[a]}</td>
 </tr>
 {/section} 
</table>
{/if}
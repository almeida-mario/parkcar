// JavaScript Document

 var url='sistema/parkcar.controle.estacionamento.php';
 
 $().ready(function(){
            
    $("#placa").focus();
	  $('#placa').mask('SSS-9999');
	
	busca_carros();
	
	
  
    $('#bt_salva').click(function(){
      
        if(fn_validador('#frm_est','[alt=obrigatorio]')){
			
			var dados =$('#frm_est').serialize();          
            executar(url,dados,2,function(retorno){
				
			   window.open('sistema/parkcar.impressao.ticket.php?tipo=E&'+dados,"popupWindow", "width=600,height=600,scrollbars=yes");	
				
			   $("#frm_est").each(function(){
				  this.reset(); 
                 });
				 	
			   
			    busca_carros(); 
				
			  
				
			}); 
			
        }
          
    });
	
	$('#bt_del').click(function(){
		
		if(fn_validador('#frm_est','[alt=obrigatorio]')){
			msgDecisao('','deletar()'); 
		}
	
	});
	
	
	$('#placa').keyup(function(e){
		
		   var filtro=trim($('#placa').val());
		
		   busca_dados(url+"?case=1&filtro="+filtro+'&',"#frm_est","#result_lista");
		   
	  });
	
	  
  
    $('#placa').focus(function(){
         
        $(this).removeClass('ui-state-error');
                  
    });
	
	
	$( "#dlg_estacionamento" ).dialog({
			autoOpen: false,
			modal:true,
			width: 600,
			buttons: [
				{
					text: "Calcular",
					click: function() {						
						calcular_tempo();
					}
				},
				{
					text: "Pagar",
					click: function() {
						pagar_estacionamento();
						//$( this ).dialog( "close" );
					},
				 	
				},
				
				{
					text: "Cancel",
					click: function() {
						$( this ).dialog( "close" );
					},
				 	
				}
			]
		});
	
	
 });
 
 
 function busca_carros(){

	 busca_dados(url+"?case=1&","#frm_est","#result_lista");
 }
 
 function deletar(){
		
  var dados =$('#frm_est').serialize();          
  executar(url,dados,3,function(retorno){
	  
	 $("#frm_est").each(function(){
		this.reset(); 
	   });
	   
	 $('#id_preco').val('');	
	 
	 busca_carros(); 
	  
  }); 
	
}


function calcular_tempo(){
	
 var dados =$('#frm_saida').serialize();   
 
 $.post(url+'?'+dados+'&case='+4,function(retorno){       
 	  
	  var str = retorno.split(";");
	  
	  $('#hora_sai').val(str[1]);
	  $('#tempo').val(str[2]);
	  $('#valor').val(str[3]);
	  	  
  }); 
	
}


function pagar_estacionamento(){
	
if(fn_validador('#frm_saida','[alt=obrigatorio]')){
		
		var dados =$('#frm_est').serialize();          
		executar(url,dados+'&hora_sai='+$('#hora_sai').val()+'&valor='+$('#valor').val(),2,function(retorno){
			
			window.open('sistema/parkcar.impressao.ticket.php?tipo=S&entrada='+$('#hora_ent').val()+'&saida='+$('#hora_sai').val()+'&tempo='+$('#tempo').val()+'&valor='+$('#valor').val()+'&'+dados,"popupWindow", "width=600,height=600,scrollbars=yes");
			
		     $("#frm_saida").each(function(){
			  this.reset(); 
			 });
			 
			 $("#frm_est").each(function(){
			  this.reset(); 
			 });
				
		   $('#dlg_estacionamento').dialog("close");
		    
			busca_carros(); 
			
		}); 
		
	}
}


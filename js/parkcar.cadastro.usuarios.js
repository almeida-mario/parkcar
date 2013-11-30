// JavaScript Document

 var url='sistema/parkcar.cadastro.usuarios.php';

$().ready(function(){
            
    $("#nome_user").focus();
	
	$('#bt_new').click(function(){
		
		$('#id_user').val('');
		
	});
	
  
    $('#bt_salva').click(function(){
      
        if(fn_validador('#frm_usuario','[alt=obrigatorio]')){
			
			var dados =$('#frm_usuario').serialize();          
            executar(url,dados,2,function(retorno){
				
			   $("#frm_usuario").each(function(){
				  this.reset(); 
                 });
				 
			   $('#id_user').val('');	 
				
			}); 
			
        }
          
    });
	
	$('#bt_del').click(function(){
		
		if(fn_validador('#frm_usuario','[alt=obrigatorio]')){
			msgDecisao('','deletar()'); 
		}
	
	});
	
	
	$('#nome_lista').keyup(function(e){
		
		   var filtro=trim($('#nome_lista').val());
		
		   busca_dados(url+"?case=1&filtro="+filtro+'&',"#frm_usuario","#result_lista");
		   
	  });
	
	
	$('#bt_pesq').click(function(e) {
         
		 busca_dados(url+"?case=1&","#frm_usuario","#result_lista");
		 
		 $('#dlg_usuarios').dialog( "open" );
		 
     });
	
	
  
  
    $('#usuario,#senha').focus(function(){
         
        $(this).removeClass('ui-state-error');
                  
    });
	
	
	
	
		
   $( "#dlg_usuarios" ).dialog({
			autoOpen: false,
			modal:true,
			width: 600,
			buttons: [
				{
					text: "Ok",
					click: function() {
						$( this ).dialog( "close" );
					}
				},
				{
					text: "Cancel",
					click: function() {
						$( this ).dialog( "close" );
					}
				}
			]
		});
  
});



function deletar(){
		
  var dados =$('#frm_usuario').serialize();          
  executar(url,dados,3,function(retorno){
	  
	 $("#frm_usuario").each(function(){
		this.reset(); 
	   });
	   
	 $('#id_user').val('');	 
	  
  }); 
	
}


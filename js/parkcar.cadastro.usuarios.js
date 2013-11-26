// JavaScript Document


$().ready(function(){
    
	 var url='sistema/parkcar.cadastro.usuarios.php';
       
  
    $("#nome_user").focus();
  
    $('#bt_salva').click(function(){
      
        if(fn_validador('#frm_usuario','[alt=obrigatorio]')){
			
			var dados =$('#frm_usuario').serialize();
			alert(dados);
            
            executar(url,dados,2);
        }
          
    });
	
	
	$('#bt_pesq').click(function(e) {
         
		 busca_dados(url+"?case=1","#frm_usuario","#result_lista");
		 
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
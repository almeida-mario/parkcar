// JavaScript Document


$().ready(function(){
  
  
    busca_dados("sistema/parkcar.cadastro.usuarios.php?case=1","#frm_usuario","#result_lista");
  
    $("#nome_user").focus();
  
    $('#bt_salva').click(function(){
      
        if(fn_validador('#frm_usuario','[alt=obrigatorio]')){
            
            $('#frm_login').submit();
        }
          
    });
  
  
    $('#usuario,#senha').focus(function(){
         
        $(this).removeClass('ui-state-error');
                  
    });
  
});


<!--Função para Retorno do Dados via Ajax-->

function busca_dados(url,form,retorno){
	
  
  var options = { 
				target	: retorno,   // target element(s) to be updated with server response 
				url		: url, // override for form's 'action' attribute 
				type	: 'POST',
						success:   function(resposta) {} // post-submit callback 
			}; 	

	$(form).ajaxSubmit(options); 
	return false;
  
	
}


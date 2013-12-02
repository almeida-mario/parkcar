// JavaScript Document

 var url='sistema/parkcar.cadastro.precos.php';
 
 $().ready(function(){
            
    $("#descricao").focus();
	
	busca_precos();
	
	$('#bt_new').click(function(){
		
		$('#id_preco').val('');
		
	});
	
  
    $('#bt_salva').click(function(){
      
        if(fn_validador('#frm_preco','[alt=obrigatorio]')){
			
			var dados =$('#frm_preco').serialize();          
            executar(url,dados,2,function(retorno){
				
			   $("#frm_preco").each(function(){
				  this.reset(); 
                 });
				 
			   $('#id_veiculo').val('');	
			   
			    busca_precos(); 
				
			}); 
			
        }
          
    });
	
	$('#bt_del').click(function(){
		
		if(fn_validador('#frm_preco','[alt=obrigatorio]')){
			msgDecisao('','deletar()'); 
		}
	
	});
	
	
	$('#descricao').keyup(function(e){
		
		   var filtro=trim($('#descricao').val());
		
		   busca_dados(url+"?case=1&filtro="+filtro+'&',"#frm_preco","#result_lista");
		   
	  });
	
	  
  
    $('#descricao').focus(function(){
         
        $(this).removeClass('ui-state-error');
                  
    });
	
	
 });
 
 
 function busca_precos(){

	 busca_dados(url+"?case=1&","#frm_preco","#result_lista");
 }
 
 function deletar(){
		
  var dados =$('#frm_preco').serialize();          
  executar(url,dados,3,function(retorno){
	  
	 $("#frm_preco").each(function(){
		this.reset(); 
	   });
	   
	 $('#id_preco').val('');	
	 
	 busca_precos(); 
	  
  }); 
	
}
// JavaScript Document

 var url='sistema/parkcar.controle.estacionamento.php';
 
 $().ready(function(){
            
    $("#placa").focus();
	
	busca_carros();
	
	
  
    $('#bt_salva').click(function(){
      
        if(fn_validador('#frm_est','[alt=obrigatorio]')){
			
			var dados =$('#frm_est').serialize();          
            executar(url,dados,2,function(retorno){
				
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
	
}// JavaScript Document
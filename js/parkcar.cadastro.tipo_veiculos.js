// JavaScript Document

 var url='sistema/parkcar.cadastro.tipo_veiculos.php';
 
 $().ready(function(){
            
    $("#descricao").focus();
	
	busca_tipos();
	
	$('#bt_new').click(function(){
		
		$('#id_veiculo').val('');
		
	});
	
  
    $('#bt_salva').click(function(){
      
        if(fn_validador('#frm_tipo','[alt=obrigatorio]')){
			
			var dados =$('#frm_tipo').serialize();          
            executar(url,dados,2,function(retorno){
				
			   $("#frm_tipo").each(function(){
				  this.reset(); 
                 });
				 
			   $('#id_veiculo').val('');	
			   
			    busca_tipos(); 
				
			}); 
			
        }
          
    });
	
	$('#bt_del').click(function(){
		
		if(fn_validador('#frm_tipo','[alt=obrigatorio]')){
			msgDecisao('','deletar()'); 
		}
	
	});
	
	
	$('#descricao').keyup(function(e){
		
		   var filtro=trim($('#descricao').val());
		
		   busca_dados(url+"?case=1&filtro="+filtro+'&',"#frm_tipo","#result_lista");
		   
	  });
	
	  
  
    $('#descricao').focus(function(){
         
        $(this).removeClass('ui-state-error');
                  
    });
	
	
 });
 
 
 function busca_tipos(){

	 busca_dados(url+"?case=1&","#frm_tipo","#result_lista");
 }
 
 function deletar(){
		
  var dados =$('#frm_tipo').serialize();          
  executar(url,dados,3,function(retorno){
	  
	 $("#frm_tipo").each(function(){
		this.reset(); 
	   });
	   
	 $('#id_veiculo').val('');	
	 
	 busca_tipos(); 
	  
  }); 
	
}
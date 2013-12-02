/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file formValidate.js
 * @copyright 28/02/2013 - 17:10:27
 *  
 */

$().ready(function(){
    
    /* Funções de Formulários */
    // Pula os campos do formulário ao apertar o botão ENTER
    
    $('input,select').keypress(function(e){
        if (e.keyCode == 13) {
            var campos = $("input:not(:hidden):not(:button):not(:reset)");
            var elemento = campos.index(this);
            if (campos[elemento + 1] != null) {
                var proximoCampo = campos[elemento + 1];
                proximoCampo.focus();
                e.preventDefault();
                return false;
            }
        } 
	
    });
	
	
	$('#bt_salva').button({
			text: true,
			icons: {
				primary: 'ui-icon-check'
			}
		});
		
  $('#bt_del').button({
		text: true,
		icons: {
			primary: 'ui-icon-trash'
		}
	});

	
   $('#bt_new').button({
		text: true,
		icons: {
			primary: 'ui-icon-document'
		}
	});		
	
   $('#bt_pesq').button({
		text: true,
		icons: {
			primary: 'ui-icon-search'
		}
	});		
	
	
});

// Validador de erros;

function fn_validador(elemento,atributo){
    var flagError = 0;
    $(elemento+' '+atributo).each(function(){
        if( $(this).val().length == 0 || $(this).val()== ''){
            $(this).addClass('ui-state-error');
					
            flagError++;
        }else{
                    
            $(this).removeClass('ui-state-error');
                   
        }
    });
	
    if(flagError>0)return false; else return true;
}


<!--Função para Retorno do Dados via Ajax-->

function busca_dados(url,form,retorno){
	
  var dados= $(form).serialize();	
  
  $(retorno).load(url+dados);
  	
}


<!--Função Ajax para  envio de transações;-->

function executar(url,dados,acao,callback){
	
	$.post(url+'?'+dados+'&case='+acao,function(retorno){
				
		   if(retorno==1){
			   
			   msgOk("Transação Realizada  com Sucesso!!!");
			   
			   callback(); //Retorno como verdadeiro.
			   			   			   
		   }else{
			   
			   msgAlerta(retorno);
		   }
		
		});
}


<!-- Tratamento Mensagens de ERRO do Sistema:-->


   function msgOk(msg){
	
	
	if(msg.length > 0){
		$('#msg_ok').text(msg);
	}else{
		$('#msg_ok').text('Operação Realizada com Sucesso!!!');
	}
	
	
	$('#msg_dlg_ok').dialog({
	 autoOpen:false,
	 width: 400,
	 bgiframe: true,
	 resizable:false,
	 modal: true
   });
   
   $('#msg_dlg_ok').dialog('open');
   
   setTimeout(function(){
	  $('#msg_dlg_ok').dialog('close')
	}, 1500);
	
	
}


function startProcesso(msg){
		
	if(msg.length > 0){
		$('#msg_processo').text(msg);
	}else{
		$('#msg_processo').text('Aguarde Processando!!!');
	}
	
	
	$('#msg_dlg_processo').dialog({
	 autoOpen:false,
	 width: 400,
	 bgiframe: true,
	 resizable:false,
	 modal: true,
	 closeOnEscape: false,
	 dialogClass: "no-close"
   });
       
   
   $('#msg_dlg_processo').dialog('open');
	
}


function stopProcesso(){

  $('#msg_dlg_processo').dialog('close');	
 	
}

function msgAlerta(msg){

    $('#msg').text(msg);
	
	$('#msg_dlg_alerta').dialog({
	 autoOpen:false,
	 width: 450,
	 bgiframe: true,
	 resizable:false,
	 modal: true,
	 buttons: {
				OK: function() {
					$(this).dialog('close');											
				}
	 }
   });
   
  
   
   $('#msg_dlg_alerta').dialog('open');
	
} 



function msgDecisao(msg,funcao){
	
	
	if(msg.length > 0){
		$('#msg_decisao').text(msg);
	}else{
		$('#msg_decisao').text('Deseja Realmente Excluir o Registro???');
	}		

	
	$('#msg_dlg_decisao').dialog({
	 autoOpen:false,
	 width: 400,
	 bgiframe: true,
	 resizable:false,
	 modal: true,
	 buttons: {
				"NÃO": function() {
					$(this).dialog('close');
					return false;
						
				},
				
				"SIM": function() {
				
				   $(this).dialog("close");
		           eval(funcao);				  
		           return true;
					
						
				}
				
				
	 }
   });
   
   
   $('#msg_dlg_decisao').dialog('open');
  	
}

<!--Retirar espaços vazios -->

function trim(str) {

  var retorno='';
  	
	for(var i=0;i<str.length;i++){
			   
			 retorno =retorno+str[i].replace(' ','+');
			   
		}
		
   return retorno;		
		
}
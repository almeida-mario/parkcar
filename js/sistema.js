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
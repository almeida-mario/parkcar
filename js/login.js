/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file login.js
 * @copyright 26/02/2013 - 15:05:27
 *  
 */

$().ready(function(){
  
    $('#usuario').focus();  
  
  
    $('#bt_login').click(function(){
      
        if(fn_validador('.form','[alt=obrigatorio]')){
            
            $('#frm_login').submit();
        }
          
    });
  
  
    $('#usuario,#senha').focus(function(){
         
        $(this).removeClass('ui-state-error');
                  
    });
  
});
/**
 * @author  M�rio Almeida  <prog.almeida@gmail.com> 
 * @file formValidate.js
 * @copyright 28/02/2013 - 17:10:27
 *  
 */

$().ready(function(){
    
    /* Fun��es de Formul�rios */
    // Pula os campos do formul�rio ao apertar o bot�o ENTER
    
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
	
	
	
   $( "#dlg_usuarios" ).dialog({
			autoOpen: true,
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

function base64_encode (data) {
  // http://kevin.vanzonneveld.net
  // +   original by: Tyler Akins (http://rumkin.com)
  // +   improved by: Bayron Guevara
  // +   improved by: Thunder.m
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   bugfixed by: Pellentesque Malesuada
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   improved by: Rafal Kukawski (http://kukawski.pl)
  // *     example 1: base64_encode('Kevin van Zonneveld');
  // *     returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA=='
  // mozilla has this native
  // - but breaks in 2.0.0.12!
  //if (typeof this.window['btoa'] === 'function') {
  //    return btoa(data);
  //}
  var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
    ac = 0,
    enc = "",
    tmp_arr = [];

  if (!data) {
    return data;
  }

  do { // pack three octets into four hexets
    o1 = data.charCodeAt(i++);
    o2 = data.charCodeAt(i++);
    o3 = data.charCodeAt(i++);

    bits = o1 << 16 | o2 << 8 | o3;

    h1 = bits >> 18 & 0x3f;
    h2 = bits >> 12 & 0x3f;
    h3 = bits >> 6 & 0x3f;
    h4 = bits & 0x3f;

    // use hexets to index into b64, and append result to encoded string
    tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
  } while (i < data.length);

  enc = tmp_arr.join('');

  var r = data.length % 3;

  return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);

}
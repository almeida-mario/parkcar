<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>{$smarty.const.SISTEMA}</title>
<link rel="shortcut icon" href="{$smarty.const.IMG}favicon.ico" />
<link href="{$smarty.const.CSS}style.css" rel="stylesheet" type="text/css" />
<link href="{$smarty.const.JQUERY}css/parkcar/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{$smarty.const.JQUERY}js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="{$smarty.const.JQUERY}js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" src="{$smarty.const.JS}sistema.js"></script>
<script type="text/javascript" src="{$smarty.const.JS}parkcar.cadastro.precos.js"></script>
</head>
<body >
<div id="barra">
  <div id="logo"><a href="../modulos/parkcar.controle.php"><img src="{$smarty.const.IMG}logo.png" height="100px" style="margin-left:70px" /></a></div>
  <div id="titulo">{$smarty.const.SISTEMA}</div>
  <div id="status">USU�RIO  : {$USER}
    <div class="loggof" style="float:right;"></br>
      <a href="../sair.php" >Fazer loggof</a> </div>
  </div>
  <div id="menu">
    <ul>
      <li><a href="../modulos/parkcar.controle.php">Home do Usu�rio</a></li>
      <li>&bull;</li>
    </ul>
  </div>
</div>
<!--barra--> 
<br />
<div class="layout">
  <div class="page"> <br />
    <br />
    <form id="frm_preco"  style="height:450px; border:1px solid;width:100%; margin-left:-11px">
      <h2 class="ui-widget-header" style="height:25px;text-align:center">Cadastro de Pre�os</h2>
      <div class="formSistema">
        <h3 style="margin-left:15px;font-weight:bold">Dados Pre�os</h3>
        <div class="field">
          <input id="id_preco" name="id_preco" type="hidden" />
          <label class="rotulo">Descri��o Pre�o:</label>
          <input id="descricao" name="descricao" style="text-transform:uppercase" type="text" alt="obrigatorio" title="Campo Obrigat�rio." class="campo" size="90" />
        </div>
         <div style="width:500px">
         <div class="field" style="width:150px; text-align:left;">
          <label class="rotulo">Valor Hora:</label>
          <input id="vlr_hora" name="vlr_hora" style="text-transform:uppercase; margin-left:5px" type="text" alt="obrigatorio" title="Campo Obrigat�rio." class="campo" size="15" />
        </div>
        
         <div class="field" style="width:150px; text-align:left">
          <label class="rotulo">Valor Adicional Hora:</label>
          <input id="vlr_ad_hora" name="vlr_ad_hora" style="text-transform:uppercase; margin-left:5px" type="text" alt="obrigatorio" title="Campo Obrigat�rio." class="campo" size="15" />
        </div>
        
         <div class="field" style="width:150px; text-align:left ">
          <label class="rotulo">Valor Adicional Fra��o:</label>
          <input id="vlr_ad_fracao" name="vlr_ad_fracao" style="text-transform:uppercase; margin-left:5px" type="text" alt="obrigatorio" title="Campo Obrigat�rio." class="campo" size="15" />
        </div>
      
       </div>  
        
         
      </div>
      <!--formSistema-->
      
       <fieldset style="display:block; margin:15px auto 0px auto; width:95%; height:150px">
        <legend>LISTAGEM</legend>
        <table cellpadding="0" cellspacing="0" border="0"  width="100%" style="table-layout:fixed;text-align:center; font-size:12px">
          <tr class="ui-state-hover" height="20px">
            <td width="15%">ID PRE�O</td>
            <td>DESCRI��O</td>
            <td width="15%">HORA</td>
            <td width="15%">AD. HORA</td>
            <td width="15%">AD. FRA��O</td>
          </tr>
        </table>
        <div id="result_lista" class="resultado"; style="display:block; height:110px"></div>
      </fieldset>
      
       
      <div class="btForm">
        <button id="bt_salva" type="button">SALVAR</button>
        &nbsp;
        <button id="bt_new"  type="reset">LIMPAR</button>
        &nbsp;
        <button id="bt_del" type="button">EXCLUIR</button>
      </div>
      <!--btForm-->
    </form>
  </div>
 
  <!--Inclus�o da Div das mensagens de Erro Padr�o do Sistema--> 
  
  {include file="includes/msgDlg.tpl"} </div>
  <div id="footer">
  <div class="suporte"> <a href="mailto:prog.almeida@gmail.com">FALAR COM O SUPORTE</a> </div>
  <!--suporte--> 
  {$smarty.const.SISTEMA}</br>
  Direitos Reservados &copy;2013 </div>
<!--footer-->
</body>
</html>
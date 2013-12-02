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
<script type="text/javascript" src="{$smarty.const.JS}parkcar.controle.estacionamento.js"></script>
<script type="text/javascript" src="{$smarty.const.JS}jquery.mask.js"></script>

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
    <form id="frm_est"  style="height:450px; border:1px solid;width:100%; margin-left:-11px">
      <h2 class="ui-widget-header" style="height:25px;text-align:center">Controle do Estacionamento</h2>
      <div class="formSistema">
        <h3 style="margin-left:15px;font-weight:bold">Dados Carros</h3>
        <div style="width:700px">
          <div class="field" style="width:100px">
            <label class="rotulo">Placa:</label>
            <input id="data_estacionamento" name="data_estacionamento" type="hidden" />
            <input id="placa" name="placa" style="text-transform:uppercase" type="text" alt="obrigatorio" title="Campo Obrigat�rio." class="campo" size="13" />
          </div>
          <div class="field" style="width:200px">
            <label class="rotulo">Tipo Ve�culo:</label>
            <select id="sl_veiculo" name="sl_veiculo" alt="obrigatorio" title="Campo Obrigat�rio.">
              <option value="">-SEL-</option>
              
            {section name=a loop=$VEICULOS.DESCRICAO}
              
              <option value="{$VEICULOS.ID_VEICULO[a]}">{$VEICULOS.DESCRICAO[a]}</option>
              
            {/section}
          
            </select>
          </div>
          <div class="field" style="width:100px">
            <label class="rotulo">Tabela:</label>
            <select id="sl_preco" name="sl_preco" style=" width:100px" alt="obrigatorio" title="Campo Obrigat�rio.">
              <option value="">-SEL-</option>
              
            {section name=a loop=$PRECOS.DESCRICAO}
              
              <option value="{$PRECOS.ID_PRECO[a]}">{$PRECOS.DESCRICAO[a]}</option>
              
            {/section}
          
            </select>
          </div>
          <div class="field" style="width:250px">
            <label class="rotulo">Cor Ve�culo:</label>
            <input id="cor" name="cor" style="text-transform:uppercase" type="text" alt="obrigatorio" title="Campo Obrigat�rio." class="campo" size="50" />
          </div>
        </div>
      </div>
      <!--formSistema-->
      
      <fieldset style="display:block; margin:15px auto 0px auto; width:95%; height:150px">
        <legend>LISTAGEM</legend>
        <table cellpadding="0" cellspacing="0" border="0"  width="100%" style="table-layout:fixed;text-align:center; font-size:12px">
          <tr class="ui-state-hover" height="20px">
            <td width="15%">PLACA</td>
            <td>DESCRI��O</td>
            <td width="15%">DATA ENT.</td>
            <td width="15%">HORA ENT.</td>
            <td width="15%">TABELA</td>
          </tr>
        </table>
        <div id="result_lista" class="resultado"; style="display:block; height:110px"></div>
      </fieldset>
      <div class="btForm">
        <button id="bt_salva" type="button">ESTACIONAR</button>
        &nbsp;
        <button id="bt_new"  type="reset">LIMPAR</button>
      </div>
      <!--btForm-->
    </form>
  </div>
  
  <div id="dlg_estacionamento" title="Pagamento do Estacionamento">
    <form id="frm_saida" style=" height:200px" onsubmit="return false">
    
      <input type="hidden" id="tipo_preco" name="tipo_preco" />
      Tabela:&nbsp;&nbsp;&nbsp;&nbsp;
      <input id="tabela" type="text" alt="obrigatorio" readonly="readonly" class="campo" size="15" />
      <br />

       Entrada:&nbsp;&nbsp;
      <input id="hora_ent" name="hora_ent" type="text" alt="obrigatorio" readonly="readonly" class="campo" size="15" />
     
       Sa�da:&nbsp;
      <input id="hora_sai" type="text" alt="obrigatorio"class="campo" size="15" />
      

       Tempo:&nbsp;&nbsp;
      <input id="tempo" type="text" alt="obrigatorio" readonly="readonly" class="campo" size="15" />
      
      <br />

       Valor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input id="valor" type="text" alt="obrigatorio" readonly="readonly" class="campo" size="15" />
      
      <br />
      <br />
      </fieldset>
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
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
<script type="text/javascript" src="{$smarty.const.JS}login.js"></script>
<script type="text/javascript" src="{$smarty.const.JS}sistema.js"></script>
<script>
$(document).ready(function() {

});


 function icon(id){
   
    alert(id);	 
	 
 }
 
</script>
</head>

<body >
<div id="barra">
  <div id="logo"><img src="{$smarty.const.IMG}logo.png" height="100px" style="margin-left:70px" /></div>
  <div id="titulo">ParkCar- Home Sistema</div>
  <div id="status">USU�RIO  : {$USER}
    <div class="loggof" style="float:right;"></br>
      <a href="../sair.php" >Fazer loggof</a> </div>
  </div>
<!--  <div id="menu">
    <ul>
      <li><a href="index.html">In&iacute;cio</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Usu&aacute;rios</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">M&oacute;dulos</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Menus</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Permiss&otilde;es</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Aplicativos</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Fun&ccedil;&otilde;es</a></li>
      <li>&bull;</li>
      <li><a href="javascript:void(0)">Empresas</a></li>
    </ul>
  </div>
</div>-->
<!--barra--> 

<br />
<div class="layout">
  <div class="page">
  
  
    {section name=a loop=$MODULOS.IDMODULO}
    
        <div class="thumb" > <a href="ocorrencia.html"><img class="icone" src="{$smarty.const.IMG}ocorrencias.png" /></br>{$MODULOS.IDMODULO[a]} - {$MODULOS.MOD_NOME[a]}  </a> </div>
    
    {/section}
  
    
       
  </div>
  
</div>

    <div id="footer">
      <div class="suporte"> <a href="mailto:prog.almeida@gmail.com">FALAR COM O SUPORTE</a> </div>
      <!--suporte--> 
      {$smarty.const.SISTEMA}</br>
      Direitos Reservados &copy;2013 
    </div>
    <!--footer--> 
</body>
</html>

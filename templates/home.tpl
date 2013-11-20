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
</head>
<body >
<div id="barra">
  <div id="logo"><img src="{$smarty.const.IMG}logo.png" height="100px" style="margin-left:70px" /></div>
  <div id="titulo">ParkCar- Home Sistema</div>
  <div id="status">USUÁRIO  : {$USER}
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
      
        <div class="thumb" > <a href="parkcar.controle.php?url="><img class="icone" src="{$smarty.const.IMG}configuracao.png" /></br>Cadastro - Usuários  </a> </div>
        <div class="thumb" > <a href="parkcar.controle.php?url="><img class="icone" src="{$smarty.const.IMG}preco.png" /></br>Cadastro - Tabela de Preços</a> </div>
        <div class="thumb" > <a href="parkcar.controle.php?url="><img class="icone" src="{$smarty.const.IMG}veiculos.png" /></br>Cadastro - Tipos de Veículos</a> </div>
        <div class="thumb" > <a href="parkcar.controle.php?url="><img class="icone" src="{$smarty.const.IMG}estacionamento.png" /></br>Controlar Estacionamento</a> </div>
        <div class="thumb" > <a href="parkcar.controle.php?url="><img class="icone" src="{$smarty.const.IMG}relatorio.png" /></br>Relatórios</a></div>
     
       
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

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
  <div id="logo"><a href="../modulos/parkcar.controle.php"><img src="{$smarty.const.IMG}logo.png" height="100px" style="margin-left:70px" /></a></div>
  <div id="titulo">{$smarty.const.SISTEMA}</div>
  <div id="status">USUÁRIO  : {$USER}
    <div class="loggof" style="float:right;"></br>
      <a href="../sair.php" >Fazer loggof</a> </div>
  </div>
  <div id="menu">
    <ul>
      <li><a href="../modulos/parkcar.controle.php">Home do Usuário</a></li>
      <li>&bull;</li>
    </ul>
  </div>
</div>
<!--barra--> 

<br />
<div class="layout">
  <div class="page"> <br />
    <br />
 
    
    <form id="frm_usuario"  style="height:400px; border:1px solid;width:100%; margin-left:-11px"> 
    
    <h2 class="ui-widget-header" style="height:25px;text-align:center">Cadastro de Usuários</h2>
    
     <div class="formSistema">
      <h3 style="margin-left:15px;font-weight:bold">Informações Pessoais</h3>
      
      
      
      <div class="field">
        <label class="rotulo">Nome Completo:</label>
        <input id="nome_user" type="text" class="campo" size="90" />
      </div>
      
      <div class="field">
        <label class="rotulo">Login:</label>
        <input id="login_user" type="text" class="campo" size="55" />
      </div>
      
      <div class="field">
        <label class="rotulo">Senha:</label>
        <input id="senha_user" type="password" class="campo" size="55" />
      </div>
    
    </div>
    <!--formSistema-->
    
    <div class="btForm">
      <button id="bt_salva" type="button">SALVAR</button>
      &nbsp;
      <button id="bt_new"  type="button">LIMPAR</button>
      &nbsp;
      <button id="bt_del" type="button">EXCLUIR</button>
    </div>
    <!--btForm--> 
   </form> 
  </div>
</div>
<div id="footer">
  <div class="suporte"> <a href="mailto:prog.almeida@gmail.com">FALAR COM O SUPORTE</a> </div>
  <!--suporte--> 
  {$smarty.const.SISTEMA}</br>
  Direitos Reservados &copy;2013 </div>
<!--footer-->
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>{$smarty.const.SISTEMA}</title>
        <link rel="shortcut icon" href="img/favicon.ico" />
        <link href="{$smarty.const.CSS}style.css" rel="stylesheet" type="text/css" />
        <link href="{$smarty.const.JQUERY}css/cantina/jquery-ui-cantina.custom.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="{$smarty.const.JQUERY}js/jquery-1.9.0.js"></script>
        <script type="text/javascript" src="{$smarty.const.JQUERY}js/jquery-ui-1.10.0.custom.js"></script>
        <script type="text/javascript" src="{$smarty.const.JS}login.js"></script>
        <script type="text/javascript" src="{$smarty.const.JS}sistema.js"></script>
    </head>

    <body>
        <div id="login">
            <div class="marca">
                <img src="img/marca.png" />
            </div><!--marca-->
       
            <div class="form">
                <form id="frm_login" name="frm_login" action="autenticar.php" method="post"> 
                USUÁRIO:<br />
                <input id="usuario"  name="usuario" alt="obrigatorio" type="text" class="campo" size="50" /><br /><br />

                SENHA:<br />
                <input id="senha" name="senha" alt="obrigatorio" type="password" class="campo" size="50" /><br /><br />

                <input id="bt_login" name="" type="button" class="botao bt-aolado" value="ENTRAR" />

                <div class="esqueci">
                    <a href="javascript:void(0)">Esqueci a senha!</a>
                </div><!--esqueci-->
                </form>
            </div><!--form-->

            <div id="footer">
                <div class="suporte">
                    <a href="javascript:void(0)">FALAR COM O SUPORTE</a>
                </div><!--suporte-->
                Tia da Cantina<br />
                Direitos Reservados &copy;2013
            </div><!--footer-->
        </div><!--login-->
    </body>
</html>
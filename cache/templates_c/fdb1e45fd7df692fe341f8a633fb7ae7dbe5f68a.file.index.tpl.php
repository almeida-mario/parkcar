<?php /* Smarty version Smarty-3.1.13, created on 2013-11-19 13:34:42
         compiled from "C:\xampp\htdocs\parkcar\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6692528ba13255b698-12461773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdb1e45fd7df692fe341f8a633fb7ae7dbe5f68a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\parkcar\\templates\\index.tpl',
      1 => 1384872122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6692528ba13255b698-12461773',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_528ba1325c9818_78982600',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528ba1325c9818_78982600')) {function content_528ba1325c9818_78982600($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title><?php echo @constant('SISTEMA');?>
</title>
        <link rel="shortcut icon" href="img/favicon.ico" />
        <link href="<?php echo @constant('CSS');?>
style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo @constant('JQUERY');?>
css/parkcar/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo @constant('JQUERY');?>
js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo @constant('JQUERY');?>
js/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="<?php echo @constant('JS');?>
login.js"></script>
        <script type="text/javascript" src="<?php echo @constant('JS');?>
sistema.js"></script>
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
                <?php echo @constant('SISTEMA');?>
<br />
                Direitos Reservados &copy;2013
            </div><!--footer-->
        </div><!--login-->
    </body>
</html><?php }} ?>
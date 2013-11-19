<?php
/**
 * @author  Mário Almeida  <prog.almeida@gmail.com> 
 * @file sair.php
 * @copyright 2013
 */	   

session_start();
unset($_SERVER['SISTEMAWEB']);
session_destroy();
header("Location:index.php?msg=deslogado")
	
?>
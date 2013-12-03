<?php
/**
 * @author  Mário Almeida    <prog.almeida@gmail.com>
 *          Kleyton Gabriel  <kleyton_gabriel@hotmail.com>
 *          Victor Rodrigues <victor.rodrigues.oliveira@gmail.com> 
 * @file sair.php
 * @copyright 2013
 */
session_start();
unset($_SERVER['SISTEMAWEB']);
session_destroy();
header("Location:index.php?msg=deslogado")
	
?>
<?php

if(!isset($_SESSION)) {
	session_start();
}

if ($_SESSION['grupo'] == 'user') {
	$_SESSION['status'] = 'falhaSemPermissao';
	header('Location: menu.php');
	exit();
}

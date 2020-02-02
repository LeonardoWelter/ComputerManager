<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

//Inicia a sessão se não houver nenhuma iniciada
if(!isset($_SESSION)) {
	session_start();
}

// Verifica o grupo da sessão, caso seja user, ele retorna ao menu
// com o erro falhaSemPermissao, se for moderador ou admin a execução continua normalmente
if ($_SESSION['grupo'] == 'user') {
	$_SESSION['status'] = 'falhaSemPermissao';
	header('Location: menu.php');
	exit();
}

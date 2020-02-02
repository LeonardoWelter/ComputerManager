<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

//Inicia a sessão se não houver nenhuma iniciada
if(!isset($_SESSION)) {
	session_start();
}

// Verifica o grupo da sessão, caso for admin nada acontece e a execução segue
// Se não for admin, retorna para o menu com o erro falhaSemPermissao que será
if ($_SESSION['grupo'] != 'admin') {
	$_SESSION['status'] = 'falhaSemPermissao';
	header('Location: menu.php');
	exit();
}
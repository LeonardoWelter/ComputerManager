<?php
/**
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Caso não exista uma Sessão, cria uma.
if(!isset($_SESSION)) {
	session_start();
}
// Caso o usuário não esteja autenticado, ele é redirecionado para a tela de login
if (!isset($_SESSION['autenticado'])) {
	$_SESSION['status'] = 'falhaNecessarioLogin';
    header('Location: ../index.php');
    exit();
}
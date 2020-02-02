<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado
require_once 'validaLogin.php';

if(!isset($_SESSION)) {
	session_start();
}

// Função que realiza a conexão com o banco de dados usando PDO
function pdo_connect_mysql()
{
	$DATABASE_HOST = 'localhost'; // Host do Banco de Dados
	$DATABASE_USER = 'CM_User'; // Usuário
	$DATABASE_PASS = 's3nh4*'; // Senha
	$DATABASE_NAME = 'ComputerManager'; //Database
	try {
		return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
	} catch (PDOException $exception) {
		// Caso dê erro na conexão, ao invés de interromper a execução, ele retorna ao menu
		// com o código de erro falhaErroCriticoSQL
		$_SESSION['status'] = 'falhaErroCriticoSQL';
		header('Location: menu.php');
		exit();
	}
}

$pdo = pdo_connect_mysql();

// Verifica se existe ID no _GET
if (isset($_GET['id'])) {
	// Seleciona a manutenção no banco de dados
	$stmt = $pdo->prepare('SELECT * FROM maintenance WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$maintenance = $stmt->fetch(PDO::FETCH_ASSOC);
	// Caso não exista nada com esse ID, retorna a lista de computadores
	// com o erro falhaRemoverIdErrado
	if (!$maintenance) {
		$_SESSION['status'] = 'falhaMostrarIdErrado';
		header('Location: manutencoes.php');
		exit();
	}
	// Caso nenhum ID seja recebido, retorna mensagem de erro e redireciona para a lista de manutenções
} else {
	$_SESSION['status'] = 'falhaMostrarIdErrado';
	header('Location: manutencoes.php');
	exit();
}

// Recebe um usuário e retorna seu Nome
function selecionaUsuario($usuario_param) {

    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM users WHERE usuario = ?');
    $stmt->execute([$usuario_param]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario;
}

// Recebe um patrimonio e retorna o nome do computador
function selecionaComputador($pat) {

    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM devices WHERE patrimonial = ?');
    $stmt->execute([$pat]);

    $computador = $stmt->fetch(PDO::FETCH_ASSOC);

    return $computador;
}
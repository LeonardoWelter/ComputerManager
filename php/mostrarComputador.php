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
	$DATABASE_NAME = 'ComputerManager'; // Database
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

// Variáveis responsáveis pelo Sort da tabela
$colunas = array('id','computador','descricao','tipo','subtipo');
$coluna = isset($_GET['coluna']) && in_array($_GET['coluna'], $colunas) ? $_GET['coluna'] : $colunas[0];
$ordem = isset($_GET['ordem']) && strtolower($_GET['ordem']) == 'desc' ? 'DESC' : 'ASC';
$cima_baixo = str_replace(array('ASC','DESC'), array('up','down'), $ordem);
$cre_dec = $ordem == 'ASC' ? 'desc' : 'asc';

// Conecta com a banco de dados
$pdo = pdo_connect_mysql();

// Verifica se existe ID no _GET
if (isset($_GET['id'])) {
	// Seleciona o computador no banco de dados
	$stmt = $pdo->prepare('SELECT * FROM devices WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	// Retorna o resultado para ser usado no Front End
	$device = $stmt->fetch(PDO::FETCH_ASSOC);

	// Seleciona as manutenções do computador seleciona
	$stmt2 = $pdo->prepare('SELECT * FROM maintenance WHERE device_pat = ? ORDER BY ' .  $coluna . ' ' . $ordem);
	$stmt2->execute([$device['patrimonial']]);
	// Retorna o resultado para ser usado no Front End
	$maintenances = $stmt2->fetchAll(PDO::FETCH_ASSOC);

	// Caso não exista um computador com esse ID, retorna mensagem de erro e redireciona para a lista de computadores
	if (!$device) {
		$_SESSION['status'] = 'falhaMostrarIdErrado';
		header('Location: computadores.php');
		exit();
	}
	// Caso nenhum ID seja recebido, retorna mensagem de erro e redireciona para a lista de computadores
} else {
	$_SESSION['status'] = 'falhaMostrarIdErrado2';
	header('Location: computadores.php');
	exit();
}

// Fecha a conexão com o Banco de Dados
$pdo = null;
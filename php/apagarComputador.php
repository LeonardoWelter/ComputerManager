<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado e possui o grupo Admin
require_once 'validaLogin.php';
require_once 'acessoAdmin.php';

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

$pdo = pdo_connect_mysql();

// Verifica se existe ID no _GET
if (isset($_GET['id'])) {
	// Seleciona o computador que será removido
	$stmt = $pdo->prepare('SELECT * FROM devices WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$device = $stmt->fetch(PDO::FETCH_ASSOC);
	// Caso não exista nada com esse ID, retorna a lista de computadores
	// com o erro falhaRemoverIdErrado
	if (!$device) {
		$_SESSION['status'] = 'falhaRemoverIdErrado';
		header('Location: computadores.php');
		exit();
		}
	// Recebe confirmação da exclusão via GET antes de remover
	if (isset($_GET['confirma'])) {
		if ($_GET['confirma'] == 'sim') {
			// Usuário confirma a exclusão, remover
			$stmt = $pdo->prepare('DELETE FROM devices WHERE id = ?');
			$stmt->execute([$_GET['id']]);

			//Retorna a mensagem de sucesso e redireciona a lista de comptuadores
			$_SESSION['status'] = 'sucessoRemoverComputador';
			header('Location: computadores.php');
			exit();
		}
	}
} else {
	// Não existe nenhum ID no GET, retorna erro falhaRemoverSemID e redireciona a lista de computadores
	$_SESSION['status'] = 'falhaRemoverSemId';
	header('Location: computadores.php');
	exit();
}
// Fecha a conexão com o Banco de Dados
$pdo = null;

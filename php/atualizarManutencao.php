<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado e possui o grupo Moderador ou Admin
require_once 'validaLogin.php';
require_once 'acessoModerador.php';

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
	if (!empty($_POST)) {
		// FailSafe caso o formulário seja enviado sem nenhum valor;
		$id = isset($_POST['id']) ? $_POST['id'] : NULL;
		$device_pat = isset($_POST['device_pat']) ? $_POST['device_pat'] : '';
		$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
		$subtipo = isset($_POST['subtipo']) ? $_POST['subtipo'] : '';
		$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
		$comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : '';
		// Atualiza o registro da manutenção
		$stmt = $pdo->prepare('UPDATE maintenance SET device_pat = ?, tipo = ?, subtipo = ?, descricao = ?, comentarios = ? WHERE id = ?');
		$stmt->execute([$device_pat, $tipo, $subtipo, $descricao, $comentarios, $_GET['id']]);

		// Retorna a mensagem de sucesso e redireciona a lista de manutenções
		$_SESSION['status'] = 'sucessoAtualizarManutencao';
		header('Location: manutencoes.php');
		exit();
	}
	// Seleciona o computador
	$stmt = $pdo->prepare('SELECT * FROM maintenance WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$maintenance = $stmt->fetch(PDO::FETCH_ASSOC);
	// Caso não exista manutenção com esse ID, retorna mensagem de erro
	// e redireciona para a lista de manutenções
	if (!$maintenance) {
		$_SESSION['status'] = 'falhaAtualizarIdErrado';
		header('Location: manutencoes.php');
		exit();
	}
	// Caso nenhum ID seja recebido via GET, retorna mensagem de erro
	// e redireciona para a lista de computadores
} else {
	$_SESSION['status'] = 'falhaAtualizarSemId';
	header('Location: manutencoes.php');
	exit();
}

// Fecha a conexão com o Banco de Dados
$pdo = null;
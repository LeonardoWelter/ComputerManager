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
		$patrimonial = isset($_POST['patrimonial']) ? $_POST['patrimonial'] : '';
		$marca = isset($_POST['marca']) ? $_POST['marca'] : '';
		$modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
		$cpu = isset($_POST['cpu']) ? $_POST['cpu'] : '';
		$ram = isset($_POST['ram']) ? $_POST['ram'] : '';
		$hdd = isset($_POST['hdd']) ? $_POST['hdd'] : '';
		$fonte = isset($_POST['fonte']) ? $_POST['fonte'] : '';
		$mac = isset($_POST['mac']) ? $_POST['mac'] : '0000:0000:0000:0000';
		$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
		$os = isset($_POST['os']) ? $_POST['os'] : '';
		// Atualiza o registro do computador
		$stmt = $pdo->prepare('UPDATE devices SET patrimonial = ?, marca = ?, modelo = ?, cpu = ?, ram = ?, hdd = ?, fonte = ?, mac = ?, nome = ?, os = ? WHERE id = ?');
		$stmt->execute([$patrimonial, $marca, $modelo, $cpu, $ram, $hdd, $fonte, $mac, $nome, $os, $_GET['id']]);


		// Retorna a mensagem de sucesso e redireciona a lista de computadores
		$_SESSION['status'] = 'sucessoAtualizarComputador';
		header('Location: computadores.php');
		exit();
	}
	// Seleciona o computador
	$stmt = $pdo->prepare('SELECT * FROM devices WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$device = $stmt->fetch(PDO::FETCH_ASSOC);
	// Caso não exista computador com esse ID, retorna mensagem de erro
	// e redireciona para a lista de computadores
	if (!$device) {
		$_SESSION['status'] = 'falhaAtualizarIdErrado';
		header('Location: computadores.php');
		exit();
	}
	// Caso nenhum ID seja recebido via GET, retorna mensagem de erro
	// e redireciona para a lista de computadores
} else {
	$_SESSION['status'] = 'falhaAtualizarSemId';
	header('Location: computadores.php');
	exit();
}

// Fecha a conexão com o Banco de Dados
$pdo = null;
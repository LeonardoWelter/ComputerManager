<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado e possui o grupo moderador ou admin
require_once 'validaLogin.php';
require_once 'acessoModerador.php';

// Função que realiza a conexão com o banco de dados usando PDO
function pdo_connect_mysql()
{
	$DATABASE_HOST = 'localhost'; // Host do banco de dados
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

// Conecta ao banco de dados
$pdo = pdo_connect_mysql();

// Verifica se o POST não está vazio
if (!empty($_POST)) {
	// Caso não esteja vazio, insere um novo registro
	// FailSafe caso o formulário seja enviado sem nenhum valor;
	$id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
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
	// Insere um novo registro no banco de dados
	$stmt = $pdo->prepare('INSERT INTO devices VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$stmt->execute([$id, $patrimonial, $marca, $modelo, $cpu, $ram, $hdd, $fonte, $mac, $nome, $os]);

	// Retorna a mensagem de sucesso e redireciona para a listagem de computadores
	$_SESSION['status'] = 'sucessoAdicionarComputador';
	header('Location: computadores.php');
	exit();
}

// Fecha a conexão com o Banco de Dados
$pdo = null;
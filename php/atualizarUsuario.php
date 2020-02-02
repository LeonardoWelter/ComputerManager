<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado e possui o grupo Moderador ou Admin
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
	if (!empty($_POST)) {
		// FailSafe caso o formulário seja enviado sem nenhum valor;
		$id = isset($_POST['id']) ? $_POST['id'] : NULL;
		$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
		$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
		// Atualiza o registro do usuário
		$stmt = $pdo->prepare('UPDATE users SET nome = ?, usuario = ?, email = ?, senha = ? WHERE id = ?');
		$stmt->execute([$nome, $usuario, $email, $senha, $_GET['id']]);

		// Retorna a mensagem de sucesso e redireciona a lista de manutenções
		$_SESSION['status'] = 'sucessoAtualizarUsuario';
		header('Location: usuarios.php');
		exit();
	}
	// Seleciona o computador
	$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	// Caso não exista usuário com esse ID, retorna mensagem de erro
	// e redireciona para a lista de usuários
	if (!$user) {
		$_SESSION['status'] = 'falhaAtualizarIdErrado';
		header('Location: usuarios.php');
		exit();
	}
	// Caso nenhum ID seja recebido via GET, retorna mensagem de erro
	// e redireciona para a lista de computadores
} else {
	$_SESSION['status'] = 'falhaAtualizarSemId';
	header('Location: usuarios.php');
	exit();
}
// Fecha a conexão com o Banco de Dados
$pdo = null;
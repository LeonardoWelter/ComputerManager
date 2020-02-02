<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado e possui o grupo moderador ou admin
require_once 'validaLogin.php';
require_once 'acessoAdmin.php';

// Dados de conexão com o banco de dados
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'CM_User';
$DATABASE_PASS = 's3nh4*';
$DATABASE_NAME = 'ComputerManager';
// Tenta realizar a conexão com o banco de dados, usando MySQLi
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// Caso dê erro na conexão, ao invés de interromper a execução, ele retorna ao menu
	// com o código de erro falhaErroCriticoSQL
	$_SESSION['status'] = 'falhaErroCriticoSQL';
	header('Location: menu.php');
	exit();
}

// Verifica se existe dados no POST
if (!isset($_POST['nome'], $_POST['usuario'], $_POST['email'], $_POST['senha'])) {
    // Caso não exista, retorna mensagem de erro e redireciona para a criação de usuários
	$_SESSION['status'] = 'falhaCriarUsuarioSemDados';
	header('Location: novoUsuario.php');
	exit();
}

// Verifica se existes valores no POST
if (empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['email']) || empty($_POST['senha'])) {
    // Caso um dos campos esteja vazio, retorna mensagem de erro e redireciona para a criação de usuários
	$_SESSION['status'] = 'falhaCriarUsuarioIncompleto';
	header('Location: novoUsuario.php');
	exit();
}

// Verifica se o email é válido
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    // Caso não seja, retorna mensagem de erro e redireciona para a criação de usuários
	$_SESSION['status'] = 'falhaCriarUsuarioEmailInvalido';
	header('Location: novoUsuario.php');
	exit();
}

// Verifica se o nome de usuario contém somente caracteres alfanuméricos
if (preg_match('/[A-Za-z0-9]+/', $_POST['usuario']) == 0) {
    // Caso não seja, retorna mensagem de erro e redireciona para a criação de usuário
	$_SESSION['status'] = 'falhaCriarUsuarioInvalido';
	header('Location: novoUsuario.php');
	exit();
}

// Verifica se a senha possui entre 5 e 20 caracteres
if (strlen($_POST['senha']) > 20 || strlen($_POST['senha']) < 5) {
	// Caso não seja, retorna mensagem de erro e redireciona para a criação de usuário
	$_SESSION['status'] = 'falhaCriarUsuarioSenhaCurta';
	header('Location: novoUsuario.php');
	exit();
}

// Verifica se já existe um usuário com o que estamos criando
if ($stmt = $con->prepare('SELECT id, senha FROM users WHERE usuario = ?')) {
    $stmt->bind_param('s', $_POST['usuario']);
    $stmt->execute();
    $stmt->store_result();
    // Realiza a verificação se alguma coluna foi retornada.
    if ($stmt->num_rows > 0) {
        // Caso exista, retorna mensagem de erro e redireciona para a criação de usuário
		$_SESSION['status'] = 'falhaCriarUsuarioExistente';
		header('Location: novoUsuario.php');
		exit();
    } else {
        // Caso não exista, insere um novo registro com os valores recebidos
        if ($stmt = $con->prepare('INSERT INTO users (usuario, senha, nome, email, grupo) VALUES (?, ?, ?, ?, ?)')) {
            // Realiza um Hash na senha para evitar possíveis invasões
            $password = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $stmt->bind_param('sssss', $_POST['usuario'], $password, $_POST['nome'], $_POST['email'], $_POST['grupo']);
            $stmt->execute();

            // Retorna mensagem de sucesso e redireciona para a criação de usuários
			$_SESSION['status'] = 'sucessoCriarUsuario';
			header('Location: novoUsuario.php');
			exit();
        } else {
            // Retorna mensagem de erro e redireciona para a criação de usuários
			$_SESSION['status'] = 'falhaCriarUsuarioSQL';
			header('Location: novoUsuario.php');
			exit();
        }
    }
    $stmt->close();
} else {
    // Retorna mensagem de erro e redireciona para a criação de usuários
	$_SESSION['status'] = 'falhaCriarUsuarioSQL';
	header('Location: novoUsuario.php');
	exit();
}
$con->close();

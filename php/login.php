<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Inicia a sessão
session_start();
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
if (!isset($_POST['email'], $_POST['senha'])) {
	// Caso não exista, retorna mensagem de erro e redireciona para a tela de login
	$_SESSION['status'] = 'falhaLoginSemDados';
	header('Location: menu.php');
	exit();
}

// Prepara o Select utilizando '?' para evitar SQL Injection
// Verifica se o email existe
if ($stmt = $con->prepare('SELECT id, senha, usuario, grupo FROM users WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    // Verifica se houve retorno de colunas
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $senha, $usuario, $grupo);
        $stmt->fetch();
        // Verifica se a senha informada é a mesma do cadastro
		// Utiliza password_verify porque a senha está em Hash
        if (password_verify($_POST['senha'], $senha)) {
			// Sucesso no login
			// Cria uma sessão, informando que o usuário está autenticado
			// Setando os atributos que são consultados futuramente em outras funções
            session_regenerate_id();
            $_SESSION['autenticado'] = TRUE;
            $_SESSION['nome'] = $_POST['email'];
            $_SESSION['id'] = $id;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['grupo'] = $grupo;

            // Retorna mensagem de sucesso, redirecionando para o menu
            $_SESSION['status'] = 'sucessoLogin';
            header('Location: menu.php');
            exit();
        } else {
        	// Falha no login, mostra mensagem de erro e redireciona para a tela de login
        	$_SESSION['status'] = 'falhaLoginIncorreto';
        	header('Location: ../index.php');
            exit();
        }
    } else {
		// Falha no login, mostra mensagem de erro e redireciona para a tela de login
		$_SESSION['status'] = 'falhaLoginIncorreto';
        header('Location: ../index.php');
		exit();
    }

    $stmt->close();
}

$con->close();

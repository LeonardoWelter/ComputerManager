<?php
if(!isset($_SESSION)) {
	session_start();
}
function pdo_connect_mysql()
{
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'CM_User';
	$DATABASE_PASS = 's3nh4*';
	$DATABASE_NAME = 'ComputerManager';
	try {
		return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
	} catch (PDOException $exception) {
		// If there is an error with the connection, stop the script and display the error.
		//die ('Failed to connect to database!');
		$_SESSION['status'] = 'falhaErroCriticoSQL';
		header('Location: menu.php');
		exit();
	}
}

$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
	// Get the contact from the contacts table
	$stmt = $pdo->prepare('SELECT * FROM maintenance WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$maintenance = $stmt->fetch(PDO::FETCH_ASSOC);
	if (!$maintenance) {
		$_SESSION['status'] = 'falhaMostrarIdErrado';
		header('Location: manutencoes.php');
		exit();
		//die ('Contact doesn\'t exist with that ID!');
	}
} else {
	//die ('No ID specified!');
	$_SESSION['status'] = 'falhaMostrarIdErrado2';
	header('Location: manutencoes.php');
	exit();
}

function selecionaUsuario($usuario_param) {

    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM users WHERE usuario = ?');
    $stmt->execute([$usuario_param]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario;
}

function selecionaComputador($pat) {

    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM devices WHERE patrimonial = ?');
    $stmt->execute([$pat]);

    $computador = $stmt->fetch(PDO::FETCH_ASSOC);

    return $computador;
}
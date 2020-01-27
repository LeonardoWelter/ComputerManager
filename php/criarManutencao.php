<?php
require_once 'validaLogin.php';
require_once 'acessoModerador.php';

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

// Connect to MySQL database
$pdo = pdo_connect_mysql();
date_default_timezone_set('America/Sao_Paulo');

if (!empty($_POST)) {
	// Post data not empty insert a new record
	// Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
	$id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
	// Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
	$device_pat = isset($_POST['device_pat']) ? $_POST['device_pat'] : '';
	$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
	$subtipo = isset($_POST['subtipo']) ? $_POST['subtipo'] : '';
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
	$comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : '';
	$data = date('d/m/Y');
	$criador = $_SESSION['usuario'];
	// Insert new record into the contacts table
	$stmt = $pdo->prepare('INSERT INTO maintenance (id, device_pat, tipo, subtipo, descricao, comentarios, data, criador) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
	$stmt->execute([$id, $device_pat, $tipo, $subtipo, $descricao, $comentarios, $data, $criador]);

	// Output message
	//$msg = 'Created Successfully!';
	$_SESSION['status'] = 'sucessoAdicionarManutencao';
	header('Location: manutencoes.php');
	exit();
}
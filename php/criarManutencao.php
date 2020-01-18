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

// Connect to MySQL database
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
	// Post data not empty insert a new record
	// Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
	$id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
	// Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
	$device_id = isset($_POST['device_id']) ? $_POST['device_id'] : '';
	$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
	$subtipo = isset($_POST['subtipo']) ? $_POST['subtipo'] : '';
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
	$comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : '';
	// Insert new record into the contacts table
	$stmt = $pdo->prepare('INSERT INTO maintenance VALUES (?, ?, ?, ?, ?, ?)');
	$stmt->execute([$id, $device_id, $tipo, $subtipo, $descricao, $comentarios]);

	// Output message
	//$msg = 'Created Successfully!';
	$_SESSION['status'] = 'sucessoAdicionarComputador';
	header('Location: manutencoes.php');
	exit();
}
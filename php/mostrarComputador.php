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

//Sort
$colunas = array('id','computador','descricao','tipo','subtipo');
$coluna = isset($_GET['coluna']) && in_array($_GET['coluna'], $colunas) ? $_GET['coluna'] : $colunas[0];
$ordem = isset($_GET['ordem']) && strtolower($_GET['ordem']) == 'desc' ? 'DESC' : 'ASC';
$cima_baixo = str_replace(array('ASC','DESC'), array('up','down'), $ordem);
$cre_dec = $ordem == 'ASC' ? 'desc' : 'asc';

$pdo = pdo_connect_mysql();
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
	// Get the contact from the contacts table
	$stmt = $pdo->prepare('SELECT * FROM devices WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$device = $stmt->fetch(PDO::FETCH_ASSOC);

	// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
	$stmt2 = $pdo->prepare('SELECT * FROM maintenance WHERE device_pat = ? ORDER BY ' .  $coluna . ' ' . $ordem);
	$stmt2->execute([$device['patrimonial']]);
	// Fetch the records so we can display them in our template.
	$maintenances = $stmt2->fetchAll(PDO::FETCH_ASSOC);

	if (!$device) {
		$_SESSION['status'] = 'falhaMostrarIdErrado';
		header('Location: computadores.php');
		exit();
		//die ('Contact doesn\'t exist with that ID!');
	}
} else {
	//die ('No ID specified!');
	$_SESSION['status'] = 'falhaMostrarIdErrado2';
	header('Location: computadores.php');
	exit();
}
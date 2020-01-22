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
	if (!empty($_POST)) {
		// This part is similar to the create.php, but instead we update a record and not insert
		$id = isset($_POST['id']) ? $_POST['id'] : NULL;
		$device_pat = isset($_POST['device_pat']) ? $_POST['device_pat'] : '';
		$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
		$subtipo = isset($_POST['subtipo']) ? $_POST['subtipo'] : '';
		$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
		$comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : '';
		// Update the record
		$stmt = $pdo->prepare('UPDATE maintenance SET device_pat = ?, tipo = ?, subtipo = ?, descricao = ?, comentarios = ? WHERE id = ?');
		$stmt->execute([$device_pat, $tipo, $subtipo, $descricao, $comentarios, $_GET['id']]);

		//$msg = 'Updated Successfully!';

		$_SESSION['status'] = 'sucessoAtualizarComputador';
		header('Location: manutencoes.php');
		exit();
	}
	// Get the contact from the contacts table
	$stmt = $pdo->prepare('SELECT * FROM maintenance WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$maintenance = $stmt->fetch(PDO::FETCH_ASSOC);
	if (!$maintenance) {
		$_SESSION['status'] = 'falhaAtualizarIdErrado';
		header('Location: manutencoes.php');
		exit();
		//die ('Contact doesn\'t exist with that ID!');
	}
} else {
	//die ('No ID specified!');
	$_SESSION['status'] = 'falhaAtualizarSemId';
	header('Location: manutencoes.php');
	exit();
}
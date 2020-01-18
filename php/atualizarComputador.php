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
		// Update the record
		$stmt = $pdo->prepare('UPDATE devices SET patrimonial = ?, marca = ?, modelo = ?, cpu = ?, ram = ?, hdd = ?, fonte = ?, mac = ?, nome = ?, os = ? WHERE id = ?');
		$stmt->execute([$patrimonial, $marca, $modelo, $cpu, $ram, $hdd, $fonte, $mac, $nome, $os, $_GET['id']]);

		//$msg = 'Updated Successfully!';

		$_SESSION['status'] = 'sucessoAtualizarComputador';
		header('Location: computadores.php');
		exit();
	}
	// Get the contact from the contacts table
	$stmt = $pdo->prepare('SELECT * FROM devices WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$device = $stmt->fetch(PDO::FETCH_ASSOC);
	if (!$device) {
		$_SESSION['status'] = 'falhaAtualizarIdErrado';
		header('Location: computadores.php');
		exit();
		//die ('Contact doesn\'t exist with that ID!');
	}
} else {
	//die ('No ID specified!');
	$_SESSION['status'] = 'falhaAtualizarSemId';
	header('Location: computadores.php');
	exit();
}
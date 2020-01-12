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
		die ('Failed to connect to database!');
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
	// Insert new record into the contacts table
	$stmt = $pdo->prepare('INSERT INTO devices VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$stmt->execute([$id, $patrimonial, $marca, $modelo, $cpu, $ram, $hdd, $fonte, $mac, $nome, $os]);

	// Output message
	//$msg = 'Created Successfully!';
	$_SESSION['status'] = 'sucessoAdicionarComputador';
	header('Location: computadores.php');
	exit();
}
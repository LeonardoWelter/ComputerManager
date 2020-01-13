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
		$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
		$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
		// Update the record
		$stmt = $pdo->prepare('UPDATE users SET nome = ?, usuario = ?, email = ?, senha = ? WHERE id = ?');
		$stmt->execute([$nome, $usuario, $email, $senha, $_GET['id']]);

		//$msg = 'Updated Successfully!';

		$_SESSION['status'] = 'sucessoAtualizarComputador';
		header('Location: usuarios.php');
		exit();
	}
	// Get the contact from the contacts table
	$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	if (!$user) {
		$_SESSION['status'] = 'falhaAtualizarIdErrado';
		header('Location: usuarios.php');
		exit();
		//die ('Contact doesn\'t exist with that ID!');
	}
} else {
	//die ('No ID specified!');
	$_SESSION['status'] = 'falhaAtualizarSemId';
	header('Location: usuarios.php');
	exit();
}
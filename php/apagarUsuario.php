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

// Check that the contact ID exists
if (isset($_GET['id'])) {
	// Select the record that is going to be deleted
	$stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
	$stmt->execute([$_GET['id']]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	if (!$user) {
		$_SESSION['status'] = 'falhaRemoverIdErrado';
		header('Location: usuarios.php');
		exit();
		//die ('Contact doesn\'t exist with that ID!');
	}
	// Make sure the user confirms beore deletion
	if (isset($_GET['confirm'])) {
		if ($_GET['confirm'] == 'yes') {
			// User clicked the "Yes" button, delete record
			$stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
			$stmt->execute([$_GET['id']]);
			//$msg = 'You have deleted the contact!';

			$_SESSION['status'] = 'sucessoRemoverComputador';

			var_dump($_SESSION['status']);
			header('Location: usuarios.php');
			exit();
		} else {
			// User clicked the "No" button, redirect them back to the read page
			header('Location: usuarios.php');
			exit();
		}
	}
} else {
	$_SESSION['status'] = 'falhaRemoverSemId';
	header('Location: usuarios.php');
	exit();
	//die ('No ID specified!');
}

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
$colunas = array('id','nome','usuario','email');
$coluna = isset($_GET['coluna']) && in_array($_GET['coluna'], $colunas) ? $_GET['coluna'] : $colunas[0];
$ordem = isset($_GET['ordem']) && strtolower($_GET['ordem']) == 'desc' ? 'DESC' : 'ASC';
$cima_baixo = str_replace(array('ASC','DESC'), array('up','down'), $ordem);
$cre_dec = $ordem == 'ASC' ? 'desc' : 'asc';

$busca = isset($_GET['busca']) ? '%'.trim($_GET['busca']).'%' : null;


// Connect to MySQL database
$pdo = pdo_connect_mysql();

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
if(!isset($_GET['busca'])) {
$stmt = $pdo->prepare('SELECT * FROM users ORDER BY ' .  $coluna . ' ' . $ordem);
$stmt->execute();
} else {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE 
                                    id LIKE ? OR nome LIKE ? OR usuario LIKE ? OR email LIKE ?
                                    ORDER BY ' . $coluna . ' ' . $ordem);
    $stmt->execute([$busca, $busca, $busca, $busca]);
}
// Fetch the records so we can display them in our template.
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

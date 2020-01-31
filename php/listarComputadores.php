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
$colunas = array('id','patrimonial','marca','modelo','cpu','nome','os');
$coluna = isset($_GET['coluna']) && in_array($_GET['coluna'], $colunas) ? $_GET['coluna'] : $colunas[0];
$ordem = isset($_GET['ordem']) && strtolower($_GET['ordem']) == 'desc' ? 'DESC' : 'ASC';
$cima_baixo = str_replace(array('ASC','DESC'), array('up','down'), $ordem);
$cre_dec = $ordem == 'ASC' ? 'desc' : 'asc';

$busca = isset($_GET['busca']) ? '%'.trim($_GET['busca']).'%' : null;

// Connect to MySQL database
$pdo = pdo_connect_mysql();

if(!isset($_GET['busca'])) {
    $totalResultados = $pdo->query('SELECT count(*) from devices')->fetchColumn();
} else {
    $totalResultados = $pdo->query("SELECT count(*) FROM devices WHERE id LIKE '$busca' OR patrimonial LIKE '$busca' OR marca LIKE '$busca' OR modelo LIKE '$busca' OR cpu LIKE '$busca' OR nome LIKE '$busca' OR os LIKE '$busca'")->fetchColumn();
}

$pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) && $_GET['pagina']>1 ? $_GET['pagina'] : 1;
$resultadosPagina = 5;

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
if(!isset($_GET['busca'])) {
    $calcPagina = ($pagina - 1) * $resultadosPagina;
    $stmt = $pdo->prepare("SELECT * FROM devices ORDER BY $coluna $ordem LIMIT $calcPagina, $resultadosPagina");
    $stmt->execute();
} else {
    $calcPagina = ($pagina - 1) * $resultadosPagina;
    $stmt = $pdo->prepare("SELECT * FROM devices WHERE 
                                    id LIKE ? OR patrimonial LIKE ? OR marca LIKE ? OR modelo LIKE ? OR cpu LIKE ? OR nome LIKE ? OR os LIKE ? 
                                    ORDER BY $coluna $ordem LIMIT $calcPagina, $resultadosPagina");
    $stmt->execute([$busca, $busca, $busca, $busca, $busca, $busca, $busca]);
}

// Fetch the records so we can display them in our template.
$devices = $stmt->fetchAll(PDO::FETCH_ASSOC);



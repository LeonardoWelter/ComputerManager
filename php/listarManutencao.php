<?php
if(!isset($_SESSION)) {
	session_start();
}
if(!isset($pdo)) {
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
}

// Connect to MySQL database
if(!isset($pdo)) {
	$pdo = pdo_connect_mysql();
}

// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 100;

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM maintenance ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$maintenances = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_devices = $pdo->query('SELECT COUNT(*) FROM maintenance')->fetchColumn();

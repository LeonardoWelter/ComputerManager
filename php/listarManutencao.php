<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($pdo)) {
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

//Sort
$colunas = array('id', 'computador', 'descricao', 'tipo', 'subtipo');
$coluna = isset($_GET['coluna']) && in_array($_GET['coluna'], $colunas) ? $_GET['coluna'] : $colunas[0];
$ordem = isset($_GET['ordem']) && strtolower($_GET['ordem']) == 'desc' ? 'DESC' : 'ASC';
$cima_baixo = str_replace(array('ASC', 'DESC'), array('up', 'down'), $ordem);
$cre_dec = $ordem == 'ASC' ? 'desc' : 'asc';

$busca = isset($_GET['busca']) ? '%' . trim($_GET['busca']) . '%' : null;


// Connect to MySQL database
if (!isset($pdo)) {
    $pdo = pdo_connect_mysql();
}

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
if (!isset($_GET['busca'])) {
    $stmt = $pdo->prepare('SELECT * FROM maintenance ORDER BY ' . $coluna . ' ' . $ordem);
    $stmt->execute();
} else {
    $stmt = $pdo->prepare('SELECT * FROM maintenance WHERE 
                                    id LIKE ? OR device_id LIKE ? OR tipo LIKE ? OR subtipo LIKE ? OR descricao LIKE ? OR comentarios LIKE ?
                                    ORDER BY ' . $coluna . ' ' . $ordem);
    $stmt->execute([$busca, $busca, $busca, $busca, $busca, $busca,]);
}

// Fetch the records so we can display them in our template.
$maintenances = $stmt->fetchAll(PDO::FETCH_ASSOC);

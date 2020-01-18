<?php
// We need to use sessions, so you should always start sessions using the below code.
if(!isset($_SESSION)) {
	session_start();
}
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['autenticado'])) {
	$_SESSION['status'] = 'falhaNecessarioLogin';
    header('Location: ../index.php');
    exit();
}
<?php


session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'CM_User';
$DATABASE_PASS = 's3nh4*';
$DATABASE_NAME = 'ComputerManager';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    //die ('Failed to connect to MySQL: ' . mysqli_connect_error());
	$_SESSION['status'] = 'falhaErroCriticoSQL';
	header('Location: menu.php');
	exit();
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['email'], $_POST['senha'])) {
    // Could not get the data that should have been sent.
	$_SESSION['status'] = 'falhaLoginSemDados';
	header('Location: menu.php');
	exit();
    //die ('Please fill both the username and password field!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, senha FROM users WHERE email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $senha);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['senha'], $senha)) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['autenticado'] = TRUE;
            $_SESSION['nome'] = $_POST['email'];
            $_SESSION['id'] = $id;
            $_SESSION['status'] = 'sucessoLogin';
            header('Location: menu.php');
            exit();
        } else {
        	$_SESSION['status'] = 'falhaLoginIncorreto';
        	// Incorrect Password
            header('Location: ../index.php');
            exit();
        }
    } else {
		$_SESSION['status'] = 'falhaLoginIncorreto';
        // 'Incorrect username!';
		header('Location: ../index.php');
		exit();
    }

    $stmt->close();
}


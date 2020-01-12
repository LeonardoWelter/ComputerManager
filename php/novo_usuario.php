<?php

// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'CM_User';
$DATABASE_PASS = 's3nh4*';
$DATABASE_NAME = 'ComputerManager';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['nome'], $_POST['usuario'], $_POST['email'], $_POST['senha'])) {
    // Could not get the data that should have been sent.
    die ('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['email']) || empty($_POST['senha'])) {
    // One or more values are empty.
    die ('Please complete the registration form');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die ('Email is not valid!');
}

if (preg_match('/[A-Za-z0-9]+/', $_POST['usuario']) == 0) {
    die ('Username is not valid!');
}

if (strlen($_POST['senha']) > 20 || strlen($_POST['senha']) < 5) {
    die ('Password must be between 5 and 20 characters long!');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, senha FROM users WHERE usuario = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->bind_param('s', $_POST['usuario']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        // Username already exists
        echo 'Username exists, please choose another!';
    } else {
        // Username doesnt exists, insert new account
        if ($stmt = $con->prepare('INSERT INTO users (usuario, senha, nome, email) VALUES (?, ?, ?, ?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $stmt->bind_param('ssss', $_POST['usuario'], $password, $_POST['nome'], $_POST['email']);
            $stmt->execute();
            echo 'You have successfully registered, you can now login!';
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
}
$con->close();

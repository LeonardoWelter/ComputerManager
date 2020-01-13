<?php
require_once "valida_login.php";
require_once 'status.php';
?>

<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Menu - Computer Manager</title>

    <?php
	require_once 'imports.php';
	?>

    <link rel="stylesheet" href="../css/menu.css">

</head>

<body>
<?php
    require_once 'navbar.php';
?>
<?php
if(isset($_SESSION['status'])) {
	echo mostrarToastr($_SESSION['status']);
}
?>
<div class="container">
    <div class="row">

        <div class="card-home">
            <div class="card">
                <div class="card-header">
                    Menu
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center text-center">
                            <a href="computadores.php">
                                <img src="../img/icons8-estação-de-trabalho-100.png" width="70" height="70">
                                <h6 class="text-dark">Computadores</h6>
                            </a>
                        </div>
                        <div class="col-6 d-flex justify-content-center text-center">
                            <a href="usuarios.php">
                                <img src="../img/icons8-pessoa-do-sexo-masculino-90.png" width="70" height="70">
                                <h6 class="text-dark">Usuários</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
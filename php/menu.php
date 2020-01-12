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
                        <div class="col-6 d-flex justify-content-center">
                            <a href="abrir_chamado.php">
                                <img src="img/formulario_abrir_chamado.png" width="70" height="70">
                            </a>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <a href="consultar_chamado.php">
                                <img src="img/formulario_consultar_chamado.png" width="70" height="70">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Require para verificar se o usuário está logado
require_once 'validaLogin.php';
require_once 'status.php';
?>

<html lang="pt">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Menu - Computer Manager</title>

    <?php
	// Imports das dependências
	require_once 'imports.php';
	?>

    <link rel="stylesheet" href="../css/menu.css">

</head>

<body>
<?php
    //Import da NavBar
    require_once 'navbar.php';
?>
<?php
if(isset($_SESSION['status'])) {
	// Função responsável pela chamada do Popup das informações de Status do Sistema
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
                        <div class="col-4 d-flex justify-content-center text-center" id="menuComputadores">
                            <a href="computadores.php">
                                <img src="../img/icons8-estação-de-trabalho-100.png" width="70px" height="70px" alt="Icone atalho computadores">
                                <h6 class="text-dark">Computadores</h6>
                            </a>
                        </div>
                        <div class="col-4 d-flex justify-content-center text-center" id="menuManutencoes">
                            <a href="manutencoes.php">
                                <img src="../img/icons8-computer-support-100.png" width="70px" height="70px" alt="Icone atalho computadores">
                                <h6 class="text-dark">Manutenções</h6>
                            </a>
                        </div>
                        <?php if($_SESSION['grupo'] == 'admin') { ?>
                            <!-- Renderiza a lista do usuários somente se o usuário for do grupo Admin -->
                        <div class="col-4 d-flex justify-content-center text-center" id="menuUsuarios">
                            <a href="usuarios.php">
                                <img src="../img/icons8-pessoa-do-sexo-masculino-90.png" width="70px" height="70px" alt="Icone atalho usuários">
                                <h6 class="text-dark">Usuários</h6>
                            </a>
                        </div>
                        <?php } else {
                            // Caso não seja do grupo Admin, reorganiza o menu para formatação correta
                            echo '<script>arrumaMenu()</script>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php require_once 'rodape.php' ?>
</body>
</html>
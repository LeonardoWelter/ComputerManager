<?php
require_once "valida_login.php";
require_once 'mostrar_manutencao.php';
require_once 'status.php';

if (!isset($_SESSION)) {
	session_start();
}
?>

<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manutenção ID <?= $maintenance['id'] ?> - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

    <link rel="stylesheet" href="../css/computador.css">

</head>

<body>

<?php
require_once 'navbar.php';
?>
<div class="container">
	<?php
	if (isset($_SESSION['status'])) {
		echo mostrarToastr($_SESSION['status']);
	}
	?>
    <nav class="navbar navbar-expand-md mt-3">
        <!-- Toggler para dispositivos móveis -->
        <button class="navbar-toggler" data-toggle="collapse" data-target="#nav2">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Links da Navegação -->
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item btn btn-light"><a href="atualiza_manutencao.php?id=<?= $maintenance['id'] ?>"
                                                      class="nav-link">Editar</a></li>
                <li class="nav-item btn btn-light"><a href="manutencoes.php" class="nav-link">Manutenções</a></li>
            </ul>
        </div>
    </nav>
    <div class="content update">
        <h2><?= $maintenance['descricao'] ?></h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered tabela">
                <caption>Informações do computador de ID: <?= $maintenance['id'] ?></caption>
                <thead class="thead text-center">
                <th colspan="2">Computador ID: <?= $maintenance['id'] ?></th>
                </thead>
                <tr>
                    <td scope="col" class="font-weight-bold">ID</td>
                    <td scope="row"><?= $maintenance['id'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold">Computador ID</td>
                    <td scope="row"><?= $maintenance['device_id'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold">Tipo</td>
                    <td scope="row"><?= $maintenance['tipo'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold">Subtipo</td>
                    <td scope="row"><?= $maintenance['subtipo'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold">Descrição</td>
                    <td scope="row"><?= $maintenance['descricao'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold">Comentários</td>
                    <td scope="row"><?= $maintenance['comentarios'] ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>

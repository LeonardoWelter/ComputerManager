<?php
require_once "validaLogin.php";
require_once 'mostrarManutencao.php';
require_once 'status.php';
require_once 'conversor.php';

if (!isset($_SESSION)) {
	session_start();
}
?>

<html lang="pt">
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
    <div class="container">
        <h2 class="mt-3 linha"><?= $maintenance['descricao'] ?></h2>
        <div class="btn-group d-flex float-right mt-1">
            <a href="atualizaManutencao.php?id=<?= $maintenance['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
            <a href="manutencoes.php" class="btn btn-sm btn-outline-primary">Manutenções</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered tabela">
                <caption>Informações do computador de ID: <?= $maintenance['id'] ?></caption>
                <thead class="thead text-center">
                <th colspan="2">Computador ID: <?= $maintenance['id'] ?></th>
                </thead>
                <tr>
                    <td class="font-weight-bold">ID</td>
                    <td><?= $maintenance['id'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Computador</td>
                    <td><?= converteComputador($maintenance['device_id']) ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Tipo</td>
                    <td><?= converteTipo($maintenance['tipo']) ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Subtipo</td>
                    <td><?= converteSubTipo($maintenance['subtipo']) ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Descrição</td>
                    <td><?= $maintenance['descricao'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Comentários</td>
                    <td><?= $maintenance['comentarios'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Data</td>
                    <td><?= $maintenance['data'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Criador</td>
                    <td><?= converteUsuario($maintenance['criador']) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php require_once 'rodape.php' ?>
</body>
</html>

<?php
require_once "validaLogin.php";
require_once 'mostrarComputador.php';
require_once 'listarManutencao.php';
require_once 'status.php';

if (!isset($_SESSION)) {
	session_start();
}
?>

<html lang="pt">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Computador ID <?= $device['id'] ?> - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

    <link rel="stylesheet" href="../css/computador.css">

</head>

<body>

<?php
require_once 'navbar.php';
?>

<?php
if (isset($_SESSION['status'])) {
	echo mostrarToastr($_SESSION['status']);
}
?>
<?php
if (isset($_GET['apaga'])) {
	?>
    <!-- Modal apagar -->
    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExcluirLabel">Remover manutenção</h5>
                </div>
                <div class="modal-body">
                    Remover a manutenção ID: <?= $_GET['apaga']; ?>?
                </div>
                <div class="modal-footer">
                    <a href="computador.php?id=<?= $_GET['id'] ?>" class="btn btn-secondary">Cancelar</a>
                    <a href="apagarManutencao.php?id=<?= $_GET['apaga'] ?>&confirm=yes"
                       class="btn btn-danger">Remover</a>
                </div>
            </div>
        </div>
    </div>
	<?php
	echo "<script>$('#modalExcluir').modal({backdrop: 'static', keyboard: false, show: true})</script>";
}
?>
<div class="container">


    <div class="container">
        <div class="btn-group d-flex float-right">
            <a href="atualizaComputador.php?id=<?= $device['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
            <a href="manutencoes.php" class="btn btn-sm btn-outline-primary">Manutenções</a>
            <a href="#" class="btn btn-sm btn-outline-primary">Ligar</a>
        </div>
        <h2 class="mt-3 mb-2"><?= $device['nome'] ?></h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped table-bordered tabela">
                <caption>Informações do computador de ID: <?= $device['id'] ?></caption>
                <thead class="thead text-center">
                <tr>
                    <th colspan="2">Computador ID: <?= $device['id'] ?></th>
                </tr>
                </thead>
                <tr>
                    <td class="font-weight-bold">ID</td>
                    <td><?= $device['id'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nome</td>
                    <td><?= $device['nome'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Patrimonial</td>
                    <td><?= $device['patrimonial'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Marca</td>
                    <td><?= $device['marca'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Modelo</td>
                    <td><?= $device['modelo'] ?></td>
                </tr>
                <thead class="thead text-center font-weight-bold">
                <tr>
                    <th colspan="2">Especificações</th>
                </tr>
                </thead>
                <tr>
                    <td class="font-weight-bold"><i class="fas fa-microchip"></i> CPU</td>
                    <td><?= $device['cpu'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><i class="fas fa-memory"></i> RAM</td>
                    <td><?= $device['ram'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><i class="fas fa-hdd"></i> HDD</td>
                    <td><?= $device['hdd'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><i class="fas fa-plug"></i> Fonte</td>
                    <td><?= $device['fonte'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><i class="fas fa-ethernet"></i> MAC</td>
                    <td><?= $device['mac'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><i class="fab fa-windows icone"></i> OS</td>
                    <td><?= $device['os'] ?></td>
                </tr>
            </table>
        </div>
        <h2>Manutenções do computador <?= $device['nome'] ?></h2>
        <table class="table table-striped table-bordered table-responsive-sm">
            <thead>
            <tr>
                <td>ID</td>
                <td>Computador</td>
                <td>Tipo</td>
                <td>Subtipo</td>
                <td>Descrição</td>
                <td>Ações</td>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($maintenances as $maintenance): ?>
                <tr>
                    <td><?= $maintenance['id'] ?></td>
                    <td><?= $maintenance['device_id'] ?></td>
                    <td><?= $maintenance['tipo'] ?></td>
                    <td><?= $maintenance['subtipo'] ?></td>
                    <td><?= $maintenance['descricao'] ?></td>
                    <td class="text-right">
                        <a href="manutencao.php?id=<?= $maintenance['id'] ?>" class="btn btn-primary btn-sm"><i
                                    class="fas fa-search"></i></a>
                        <a href="atualizaManutencao.php?id=<?= $maintenance['id'] ?>" class="btn btn-primary btn-sm"><i
                                    class="fas fa-pen"></i></a>
                        <a href="computador.php?id=<?= $_GET['id'] ?>&apaga=<?= $maintenance['id'] ?>"
                           class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash"></i></a>
                    </td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

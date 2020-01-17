<?php
require_once "valida_login.php";
require_once 'mostrar_computador.php';
require_once 'listar_manutencao.php';
require_once 'status.php';

if (!isset($_SESSION)) {
	session_start();
}
?>

<html>
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
<div class="container">
	<?php
	if (isset($_SESSION['status'])) {
		echo mostrarToastr($_SESSION['status']);
	}
	?>

    <div class="container">
        <div class="btn-group d-flex float-right">
            <a href="atualiza_computador.php?id=<?= $device['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
            <a href="manutencoes.php" class="btn btn-sm btn-outline-primary">Manutenções</a>
            <a href="#" class="btn btn-sm btn-outline-primary">Ligar</a>
        </div>
        <h2 class="mt-3 mb-2"><?= $device['nome'] ?></h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped table-bordered tabela">
                <caption>Informações do computador de ID: <?= $device['id'] ?></caption>
                <thead class="thead text-center">
                <th colspan="2">Computador ID: <?= $device['id'] ?></th>
                </thead>
                <tr>
                    <td scope="col" class="font-weight-bold">ID</td>
                    <td scope="row"><?= $device['id'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold">Nome</td>
                    <td scope="row"><?= $device['nome'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold">Patrimonial</td>
                    <td scope="row"><?= $device['patrimonial'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold">Marca</td>
                    <td scope="row"><?= $device['marca'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold">Modelo</td>
                    <td scope="row"><?= $device['modelo'] ?></td>
                </tr>
                <thead class="thead text-center">
                <th colspan="2">Especificações</th>
                </thead>
                <tr>
                    <td scope="col" class="font-weight-bold"><i class="fas fa-microchip"></i> CPU</td>
                    <td scope="row"><?= $device['cpu'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold"><i class="fas fa-memory"></i> RAM</td>
                    <td scope="row"><?= $device['ram'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold"><i class="fas fa-hdd"></i> HDD</td>
                    <td scope="row"><?= $device['hdd'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold"><i class="fas fa-plug"></i> Fonte</td>
                    <td scope="row"><?= $device['fonte'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold"><i class="fas fa-ethernet"></i> MAC</td>
                    <td scope="row"><?= $device['mac'] ?></td>
                </tr>
                <tr>
                    <td scope="col" class="font-weight-bold"><i class="fab fa-windows icone"></i> OS</td>
                    <td scope="row"><?= $device['os'] ?></td>
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
                        <a href="atualiza_manutencao.php?id=<?= $maintenance['id'] ?>" class="btn btn-primary btn-sm"><i
                                    class="fas fa-pen"></i></a>
                        <a href="apaga_manutencao.php?id=<?= $maintenance['id'] ?>" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash"></i></a>
                    </td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

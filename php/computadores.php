<?php
require_once "valida_login.php";
require_once 'listar_computadores.php';
require_once 'status.php';

if (!isset($_SESSION)) {
	session_start();
}
?>


<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Computadores - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

    <link rel="stylesheet" href="../css/computadores.css">
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

<div class="container">
    <h2 class="mt-3">Computadores</h2>
    <div class="btn-group d-flex float-right mt-3 mb-2">
        <a href="novo_computador.php" class="btn btn-sm btn-outline-primary">Adicionar computador</a>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-responsive-sm">
        <thead>
        <tr>
            <td>ID</td>
            <td>Patrimonial</td>
            <td>Marca</td>
            <td>Modelo</td>
            <td>CPU</td>
            <td>Nome</td>
            <td>OS</td>
            <td>Ações</td>
        </tr>
        </thead>
        <tbody>
		<?php foreach ($devices as $device): ?>
            <tr>
                <td><?= $device['id'] ?></td>
                <td><?= $device['patrimonial'] ?></td>
                <td><?= $device['marca'] ?></td>
                <td><?= $device['modelo'] ?></td>
                <td><?= $device['cpu'] ?></td>
                <td><?= $device['nome'] ?></td>
                <td><?= $device['os'] ?></td>
                <td class="text-right">
                    <a href="computador.php?id=<?= $device['id'] ?>" class="btn btn-sm btn-primary"><i
                                class="fas fa-search"></i></a>
                    <a href="atualiza_computador.php?id=<?= $device['id'] ?>" class="btn btn-sm btn-primary"><i
                                class="fas fa-pen"></i></a>
                    <a href="apaga_computador.php?id=<?= $device['id'] ?>" class="btn btn-sm btn-danger"><i
                                class="fas fa-trash"></i></a>
                </td>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
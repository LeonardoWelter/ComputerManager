<?php
require_once "validaLogin.php";
require_once 'listarComputadores.php';
require_once 'status.php';

if (!isset($_SESSION)) {
	session_start();
}
?>


<html lang="pt">
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

<?php
if (isset($_GET['apaga'])) {
    ?>
<!-- Modal apagar -->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExcluirLabel">Remover manutenção</h5>
            </div>
            <div class="modal-body">
                Remover o computador ID: <?= $_GET['apaga']; ?>?
            </div>
            <div class="modal-footer">
                <a href="manutencoes.php" class="btn btn-secondary" >Cancelar</a>
                <a href="apagarComputador.php?id=<?= $_GET['apaga']?>&confirm=yes" class="btn btn-danger">Remover</a>
            </div>
        </div>
    </div>
</div>
<?php
	echo "<script>$('#modalExcluir').modal({backdrop: 'static', keyboard: false, show: true})</script>";
}
?>

<div class="container">
    <h2 class="mt-3">Computadores</h2>
    <div class="btn-group d-flex float-right mt-3 mb-2">
        <a href="novoComputador.php" class="btn btn-sm btn-outline-primary">Adicionar computador</a>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-responsive-sm">
        <thead>
        <tr>
            <th><a href="computadores.php?coluna=id&ordem=<?php echo $cre_dec; ?>">ID<i class="fas fa-sort<?php echo $coluna == 'id' ? '-' . $cima_baixo : ''; ?>"</a></th>
            <th><a href="computadores.php?coluna=patrimonial&ordem=<?php echo $cre_dec; ?>">Patrimonial<i class="fas fa-sort<?php echo $coluna == 'patrimonial' ? '-' . $cima_baixo : ''; ?>"</a></th>
            <th><a href="computadores.php?coluna=marca&ordem=<?php echo $cre_dec; ?>">Marca<i class="fas fa-sort<?php echo $coluna == 'marca' ? '-' . $cima_baixo : ''; ?>"</a></th>
            <th><a href="computadores.php?coluna=modelo&ordem=<?php echo $cre_dec; ?>">Modelo<i class="fas fa-sort<?php echo $coluna == 'modelo' ? '-' . $cima_baixo : ''; ?>"</a></th>
            <th><a href="computadores.php?coluna=cpu&ordem=<?php echo $cre_dec; ?>">CPU<i class="fas fa-sort<?php echo $coluna == 'cpu' ? '-' . $cima_baixo : ''; ?>"</a></th>
            <th><a href="computadores.php?coluna=nome&ordem=<?php echo $cre_dec; ?>">Nome<i class="fas fa-sort<?php echo $coluna == 'nome' ? '-' . $cima_baixo : ''; ?>"</a></th>
            <th><a href="computadores.php?coluna=os&ordem=<?php echo $cre_dec; ?>">OS<i class="fas fa-sort<?php echo $coluna == 'os' ? '-' . $cima_baixo : ''; ?>"</a></th>
            <th>Ações</th>
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
                    <a href="atualizaComputador.php?id=<?= $device['id'] ?>" class="btn btn-sm btn-primary"><i
                                class="fas fa-pen"></i></a>
                    <a href="computadores.php?apaga=<?= $device['id'] ?>" class="btn btn-sm btn-danger"><i
                                class="fas fa-trash"></i></a>
                </td>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
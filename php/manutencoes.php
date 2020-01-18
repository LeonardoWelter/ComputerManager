<?php
require_once "validaLogin.php";
require_once 'listarManutencao.php';
require_once 'status.php';

if(!isset($_SESSION)) {
	session_start();
}
?>


<html lang="pt">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Manutenções - Computer Manager</title>

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
if(isset($_SESSION['status'])) {
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
                    Remover a manutenção ID: <?= $_GET['apaga']; ?>?
                </div>
                <div class="modal-footer">
                    <a href="computadores.php" class="btn btn-secondary" >Cancelar</a>
                    <a href="apagarManutencao.php?id=<?= $_GET['apaga']?>&confirm=yes" class="btn btn-danger">Remover</a>
                </div>
            </div>
        </div>
    </div>
	<?php
	echo "<script>$('#modalExcluir').modal({backdrop: 'static', keyboard: false, show: true})</script>";
}
?>

<div class="container">
	<h2 class="mt-3">Manutenções</h2>
	<div class="btn-group d-flex float-right mt-3 mb-2">
		<a href="novoManutencao.php" class="btn btn-sm btn-outline-primary">Adicionar manutenção</a>
	</div>
    <hr>
	<table class="table table-striped table-bordered table-responsive-sm">
		<thead>
		<tr>
			<td>ID</td>
			<td>Computador</td>
			<td>Descrição</td>
			<td>Tipo</td>
			<td>Subtipo</td>
			<td>Ações</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($maintenances as $maintenance): ?>
			<tr>
				<td><?=$maintenance['id']?></td>
				<td><?=$maintenance['device_id']?></td>
				<td><?=$maintenance['tipo']?></td>
				<td><?=$maintenance['subtipo']?></td>
				<td><?=$maintenance['descricao']?></td>
				<td class="text-right">
					<a href="manutencao.php?id=<?=$maintenance['id']?>" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a>
					<a href="atualizaManutencao.php?id=<?=$maintenance['id']?>" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
					<a href="manutencoes.php?apaga=<?=$maintenance['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
</body>
</html>
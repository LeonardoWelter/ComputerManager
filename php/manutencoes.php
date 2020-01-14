<?php
require_once "valida_login.php";
require_once 'listar_manutencao.php';
require_once 'status.php';

if(!isset($_SESSION)) {
	session_start();
}
?>


<html>
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

<div class="content read">
	<h2>Manutenções</h2>
	<a href="novo_manutencao.php" class="create-contact">Adicionar manutenção</a>
	<table class="table table-striped table-bordered">
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
				<td class="actions">
					<a href="manutencao.php?id=<?=$maintenance['id']?>" class="edit"><i class="fas fa-search"></i></a>
					<a href="atualiza_manutencao.php?id=<?=$maintenance['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
					<a href="apaga_manutencao.php?id=<?=$maintenance['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
</body>
</html>
<?php
require_once "validaLogin.php";
require_once 'listarUsuarios.php';
require_once 'status.php';

if(!isset($_SESSION)) {
	session_start();
}
?>


<html lang="pt">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Usuários - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

	<link rel="stylesheet" href="../css/usuarios.css">
    <link rel="stylesheet" href="../css/tabelas.css">

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
                    <h5 class="modal-title" id="modalExcluirLabel">Remover usuário</h5>
                </div>
                <div class="modal-body">
                    Remover o usuário ID: <?= $_GET['apaga']; ?>?
                </div>
                <div class="modal-footer">
                    <a href="computadores.php" class="btn btn-secondary" >Cancelar</a>
                    <a href="apagarUsuario.php?id=<?= $_GET['apaga']?>&confirm=yes" class="btn btn-danger">Remover</a>
                </div>
            </div>
        </div>
    </div>
	<?php
	echo "<script>$('#modalExcluir').modal({backdrop: 'static', keyboard: false, show: true})</script>";
}
?>

<div class="container">
    <h2 class="mt-3">Usuários</h2>
    <div class="btn-group d-flex float-right mt-3 mb-2">
        <a href="cadastro.php" class="btn btn-sm btn-outline-primary">Cadastrar usuário</a>
    </div>
	<hr>
	<table class="table table-striped table-bordered table-responsive-sm">
		<thead>
		<tr>
			<th><a href="usuarios.php?coluna=id&ordem=<?php echo $cre_dec; ?>">ID<i class="fas fa-sort<?php echo $coluna == 'id' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th><a href="usuarios.php?coluna=nome&ordem=<?php echo $cre_dec; ?>">Nome<i class="fas fa-sort<?php echo $coluna == 'nome' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th><a href="usuarios.php?coluna=usuario&ordem=<?php echo $cre_dec; ?>">Usuário<i class="fas fa-sort<?php echo $coluna == 'usuario' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th><a href="usuarios.php?coluna=email&ordem=<?php echo $cre_dec; ?>">Email<i class="fas fa-sort<?php echo $coluna == 'email' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th>Ações</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?=$user['id']?></td>
				<td><?=$user['nome']?></td>
				<td><?=$user['usuario']?></td>
				<td><?=$user['email']?></td>
				<td class="text-right">
					<a href="atualizaUsuario.php?id=<?=$user['id']?>" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
					<a href="usuarios.php?apaga=<?=$user['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
</body>
</html>
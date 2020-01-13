<?php
require_once "valida_login.php";
require_once 'listar_usuarios.php';
require_once 'status.php';

if(!isset($_SESSION)) {
	session_start();
}
?>


<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Usuários - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

	<link rel="stylesheet" href="../css/usuarios.css">
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
	<h2>Usuários</h2>
	<a href="cadastro.php" class="create-contact">Cadastrar usuário</a>
	<table>
		<thead>
		<tr>
			<td>ID</td>
			<td>Nome</td>
			<td>Usuário</td>
			<td>Email</td>
			<td></td>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?=$user['id']?></td>
				<td><?=$user['nome']?></td>
				<td><?=$user['usuario']?></td>
				<td><?=$user['email']?></td>
				<td class="actions">
					<a href="atualiza_usuario.php?id=<?=$user['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
					<a href="apaga_usuario.php?id=<?=$user['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
</body>
</html>
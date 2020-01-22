<?php
require_once 'validaLogin.php';
require_once 'listarUsuarios.php';
require_once 'status.php';
require_once 'manipuladorUrl.php';

if(!isset($_SESSION)) {
	session_start();
}

$urlAtual = "http://$_SERVER[HTTP_HOST]:$_SERVER[SERVER_PORT]$_SERVER[REQUEST_URI]";
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
    <h2 class="mt-3 linha">Usuários</h2>
    <div class="btn-group d-flex float-right mt-1">
        <form action="manipuladorUrl.php" method="post">
            <div class="input-group">
                <input class="form-control d-none" name="url" type="text" value="<?= $urlAtual ?>">
                <input class="form-control d-none" name="redir" type="text" value="true">
                <input class="form-control" id="buscar" name="valorBusca" type="text" value="<?= isset($_GET['busca']) ? $_GET['busca'] : null; ?>"
                       placeholder="Pesquisar">
                <span class="input-group-append">
                    <input class="btn btn-sm btn-outline-primary" type="submit" value="Pesquisar">
                    </span>
            </div>
        </form>
    </div>
    <div class="btn-group d-flex float-right mt-1 mr-2">
        <a href="cadastro.php" class="btn btn-sm btn-outline-primary">Cadastrar usuário</a>
    </div>
	<table class="table table-striped table-bordered table-responsive-sm">
		<thead>
		<tr>
			<th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'id', 'ordem' => $cre_dec), null) ?>">ID<i class="fas fa-sort<?php echo $coluna == 'id' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'nome', 'ordem' => $cre_dec), null) ?>">Nome<i class="fas fa-sort<?php echo $coluna == 'nome' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'usuario', 'ordem' => $cre_dec), null) ?>">Usuário<i class="fas fa-sort<?php echo $coluna == 'usuario' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'email', 'ordem' => $cre_dec), null) ?>">Email<i class="fas fa-sort<?php echo $coluna == 'email' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
            <th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'grupo', 'ordem' => $cre_dec), null) ?>">Grupo<i class="fas fa-sort<?php echo $coluna == 'grupo' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
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
                <td><?=$user['grupo']?></td>
                <td class="text-right">
					<a href="atualizaUsuario.php?id=<?=$user['id']?>" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
					<a href="usuarios.php?apaga=<?=$user['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php require_once 'rodape.php' ?>
</body>
</html>
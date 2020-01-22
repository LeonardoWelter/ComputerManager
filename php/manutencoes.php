<?php
require_once "validaLogin.php";
require_once 'listarManutencao.php';
require_once 'status.php';
require_once 'manipuladorUrl.php';
require_once 'conversor.php';

if(!isset($_SESSION)) {
	session_start();
}

$urlAtual = "http://$_SERVER[HTTP_HOST]:$_SERVER[SERVER_PORT]$_SERVER[REQUEST_URI]";
?>


<html lang="pt">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Manutenções - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

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
	<h2 class="mt-3 linha">Manutenções</h2>
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
		<a href="novoManutencao.php" class="btn btn-sm btn-outline-primary">Adicionar manutenção</a>
	</div>
    <table class="table table-striped table-bordered table-responsive-sm">
		<thead>
		<tr>
			<th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'id', 'ordem' => $cre_dec), null) ?>">ID<i class="fas fa-sort<?php echo $coluna == 'id' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'device_id', 'ordem' => $cre_dec), null) ?>">Computador<i class="fas fa-sort<?php echo $coluna == 'device_id' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'descricao', 'ordem' => $cre_dec), null) ?>">Descrição<i class="fas fa-sort<?php echo $coluna == 'descricao' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'tipo', 'ordem' => $cre_dec), null) ?>">Tipo<i class="fas fa-sort<?php echo $coluna == 'tipo' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
			<th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'subtipo', 'ordem' => $cre_dec), null) ?>">Subtipo<i class="fas fa-sort<?php echo $coluna == 'subtipo' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
            <th><a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'data', 'ordem' => $cre_dec), null) ?>">Data<i class="fas fa-sort<?php echo $coluna == 'data' ? '-' . $cima_baixo : ''; ?>"></i></a></th>

            <th>Ações</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($maintenances as $maintenance): ?>
			<tr>
				<td><?=$maintenance['id']?></td>
				<td><?=converteComputadorLista($maintenance['device_id'])?></td>
				<td><?=$maintenance['descricao']?></td>
				<td><?=converteTipo($maintenance['tipo'])?></td>
				<td><?=converteSubTipo($maintenance['tipo'])?></td>
                <td><?=$maintenance['data']?></td>
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
<?php require_once 'rodape.php' ?>
</body>
</html>
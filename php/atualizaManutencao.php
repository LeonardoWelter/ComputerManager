<?php
require_once 'validaLogin.php';
require_once 'acessoModerador.php';
require_once 'atualizarManutencao.php';
require_once 'conversor.php';
?>


<html lang="pt">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Atualizar manutenção - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

	<link rel="stylesheet" href="../css/cadastro.css">
</head>

<body>

<?php
require_once 'navbar.php';
?>

<div class="container">
	<div class="row">

		<div class="card-login">
			<div class="card">
				<div class="card-header text-center">
					Atualizar manutenção ID: <?= $maintenance['id'] ?>
				</div>
				<div class="card-body">
					<form action="atualizarManutencao.php?id=<?= $maintenance['id'] ?>" method="post">
						<div class="form-group">
							<label for="cadastroId">ID</label>
							<input id="cadastroId" name="id" type="text" class="form-control"
								   placeholder="id" value="<?= $maintenance['id'] ?>" disabled>
						</div>
						<div class="form-group">
							<label for="cadastroNome">Patrimônio</label>
							<input id="cadastroNome" name="device_pat" type="text" class="form-control"
								   placeholder="ID do Computador" value="<?= $maintenance['device_pat'] ?>" required>
						</div>
						<div class="form-group">
							<label for="cadastroTipo">Tipo</label>
							    <select id="cadastroTipo" name="tipo" class="custom-select" required onchange="gerarOptions()">
<!--                                    <option value="" selected disabled>Selecione o Tipo</option>-->
<!--                                    <option value="hardware">Hardware</option>-->
<!--                                    <option value="software">Software</option>-->
<!--                                    <option value="rede">Rede</option>-->
<!--                                    <option value="outro">Outro</option>-->
                                    <?php switchManutencao($maintenance['tipo']); ?>
                                </select>
						</div>
						<div class="form-group">
							<label for="cadastroSubTipo">Subtipo</label>
							<select id="cadastroSubTipo" name="subtipo" class="custom-select" required>
								<option value="" selected disabled>Selecione o Subtipo</option>
							</select>
						</div>
						<div class="form-group">
							<label for="cadastroDescricao">Descrição</label>
							<input id="cadastroDescricao" name="descricao" type="text" class="form-control"
								   placeholder="Descrição da manutenção" value="<?= $maintenance['descricao'] ?> " required>
						</div>
						<div class="form-group">
							<label for="cadastroComentarios">Comentários</label>
							<input id="cadastroComentarios" name="comentarios" type="text" class="form-control"
								   placeholder="Comentários da manutenção" value="<?= $maintenance['comentarios'] ?>" required>
						</div>
						<button class="btn btn-lg btn-info btn-block" type="submit">Atualizar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'rodape.php' ?>
</body>
</html>
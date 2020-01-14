<?php
require_once "valida_login.php";
require_once 'atualizar_manutencao.php';
?>


<html>
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
					<form action="atualizar_manutencao.php?id=<?= $maintenance['id'] ?>" method="post">
						<div class="form-group">
							<label for="cadastroId">ID</label>
							<input id="cadastroId" name="id" type="text" class="form-control"
								   placeholder="id" value="<?= $maintenance['id'] ?>" disabled>
						</div>
						<div class="form-group">
							<label for="cadastroNome">ID Computador</label>
							<input id="cadastroNome" name="device_id" type="text" class="form-control"
								   placeholder="ID do Computador" value="<?= $maintenance['device_id'] ?>">
						</div>
						<div class="form-group">
							<label for="cadastroTipo">Tipo</label>
							<select id="cadastroTipo" name="tipo" class="custom-select">
								<option value="" selected disabled>Selecione o Tipo</option>
								<option value="1">Tipo 1</option>
								<option value="2">Tipo 2</option>
							</select>
						</div>
						<div class="form-group">
							<label for="cadastroSubTipo">Subtipo</label>
							<select id="cadastroSubTipo" name="subtipo" class="custom-select">
								<option value="" selected disabled>Selecione o Subtipo</option>
								<option value="1">Subtipo 1</option>
								<option value="2">Subtipo 2</option>
							</select>
						</div>
						<div class="form-group">
							<label for="cadastroDescricao">Descrição</label>
							<input id="cadastroDescricao" name="descricao" type="text" class="form-control"
								   placeholder="Descrição da manutenção" value="<?= $maintenance['descricao'] ?>">
						</div>
						<div class="form-group">
							<label for="cadastroComentarios">Comentários</label>
							<input id="cadastroComentarios" name="comentarios" type="text" class="form-control"
								   placeholder="Comentários da manutenção" value="<?= $maintenance['comentarios'] ?>">
						</div>
						<button class="btn btn-lg btn-info btn-block" type="submit">Atualizar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
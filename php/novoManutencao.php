<?php
require_once "validaLogin.php";
require_once 'criarComputador.php';
require_once 'status.php';
?>


<html lang="pt">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastrar computador - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

    <link rel="stylesheet" href="../css/novo_computador.css">
</head>

<body>

<?php
require_once 'navbar.php';
?>
<div class="container">
    <h2 class="mt-3 mb-2">Adicionar Manutenção</h2>
    <hr>
    <form action="criarManutencao.php" method="post">
        <div class="form-group">
            <label for="id">ID</label>
            <input class="form-control" type="text" name="id" placeholder="0" value="auto" id="id" disabled>
        </div>
        <div class="form-group">
            <label for="device_id">Computador ID</label>
            <input class="form-control" type="number" name="device_id" placeholder="23" id="device_id" required>
        </div>
        <div class="form-group">
            <label for="cadastroTipo"><i class="fas fa-users mr-1"></i>Tipo</label>
            <select id="cadastroTipo" name="tipo" class="custom-select" required>
                <option value="" selected disabled>Selecione o Tipo</option>
                <option value="1">Tipo 1</option>
                <option value="2">Tipo 2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cadastroSubTipo"><i class="fas fa-users mr-1"></i>Subtipo</label>
            <select id="cadastroSubTipo" name="subtipo" class="custom-select" required>
                <option value="" selected disabled>Selecione o Subtipo</option>
                <option value="1">Subtipo 1</option>
                <option value="2">Subtipo 2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" placeholder="Descrição da manutenção" id="descricao" required></textarea>
        </div>
        <div class="form-group">
            <label for="comentarios">Comentários</label>
            <textarea class="form-control" name="comentarios" placeholder="Comentários da manutenção" id="comentarios" required></textarea>
        </div>
        <input class="btn btn-block btn-primary" type="submit" value="Criar">
    </form>
</div>
<?php require_once 'rodape.php' ?>
</body>
</html>
<?php
require_once "valida_login.php";
require_once 'criar_computador.php';
require_once 'status.php';
?>


<html>
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
<div class="content update">
    <h2>Adicionar Manutenção</h2>
    <form action="criar_manutencao.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="0" value="auto" id="id" disabled>

        <label for="patrimonial">Computador ID</label>
        <input type="number" name="device_id" placeholder="23" id="device_id">

        <div class="form-group">
            <label for="cadastroTipo"><i class="fas fa-users mr-1"></i></i>Tipo</label>
            <select id="cadastroTipo" name="tipo" class="custom-select">
                <option value="" selected disabled>Selecione o Tipo</option>
                <option value="1">Tipo 1</option>
                <option value="2">Tipo 2</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cadastroSubTipo"><i class="fas fa-users mr-1"></i></i>Subtipo</label>
            <select id="cadastroSubTipo" name="subtipo" class="custom-select">
                <option value="" selected disabled>Selecione o Subtipo</option>
                <option value="1">Subtipo 1</option>
                <option value="2">Subtipo 2</option>
            </select>
        </div>

        <label for="cpu">Descrição</label>
        <input type="text" name="descricao" placeholder="Descrição da manutenção" id="descricao">

        <label for="ram">Comentários</label>
        <input type="text" name="comentarios" placeholder="Comentários da manutenção" id="comentarios">

        <input type="submit" value="Criar">
    </form>
</div>
</body>
</html>
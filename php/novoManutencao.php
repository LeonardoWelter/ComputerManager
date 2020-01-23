<?php
require_once 'validaLogin.php';
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

    <link rel="stylesheet" href="../css/novoComputador.css">
    <script src="../js/scripts.js"></script>
</head>

<body>

<?php
require_once 'navbar.php';
?>
<div class="container">
    <h2 class="mt-3 linha">Adicionar Manutenção</h2>
    <form action="criarManutencao.php" method="post">
        <div class="form-group">
            <label for="id">ID</label>
            <input class="form-control" type="text" name="id" placeholder="0" value="auto" id="id" disabled>
        </div>
        <div class="form-group">
            <label for="device_pat">Patrimônio</label>
            <input class="form-control" type="number" name="device_pat" placeholder="23" id="device_pat" required>
        </div>
        <div class="form-group">
            <label for="cadastroTipo"><i class="fas fa-users mr-1"></i>Tipo</label>
            <select id="cadastroTipo" name="tipo" class="custom-select" required onchange="gerarOptions()">
                <option value="" selected disabled>Selecione o Tipo</option>
                <option value="hardware">Hardware</option>
                <option value="software">Software</option>
                <option value="rede">Rede</option>
                <option value="outro">Outro</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cadastroSubTipo"><i class="fas fa-users mr-1"></i>Subtipo</label>
            <select id="cadastroSubTipo" name="subtipo" class="custom-select" required>
                <option value="" selected disabled>Selecione o Subtipo</option>
<!--                <option value="instalacao">Instalação</option>-->
<!--                <option value="substituicao">Substituição</option>-->

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
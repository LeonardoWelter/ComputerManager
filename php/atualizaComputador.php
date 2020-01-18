<?php
require_once "validaLogin.php";
require_once 'atualizarComputador.php';
?>


<html lang="pt">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Atualizar computador - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

    <link rel="stylesheet" href="../css/atualiza_computador.css">
</head>

<body>

<?php
require_once 'navbar.php';
?>
<div class="container">
    <h2 class="mt-3 mb-2">Atualizar computador ID: <?= $device['id'] ?></h2>
    <hr>
    <form action="atualizarComputador.php?id=<?= $device['id'] ?>" method="post">
        <div class="form-group">
            <label for="id">ID</label>
            <input class="form-control" type="text" name="id" placeholder="0" value="<?= $device['id'] ?>" id="id"
                   disabled>
        </div>
        <div class="form-group">
            <label for="patrimonial">Patrimonial</label>
            <input class="form-control" type="text" name="patrimonial" placeholder="000001" id="patrimonial"
                   value="<?= $device['patrimonial'] ?>" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input class="form-control" type="text" name="marca" placeholder="Lenovo" id="marca"
                   value="<?= $device['marca'] ?>" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input class="form-control" type="text" name="modelo" placeholder="M92p" id="modelo"
                   value="<?= $device['modelo'] ?>" required>
        </div>
        <div class="form-group">
            <label for="cpu">CPU</label>
            <input class="form-control" type="text" name="cpu" placeholder="i7 3700" id="cpu"
                   value="<?= $device['cpu'] ?>" required>
        </div>
        <div class="form-group">
            <label for="ram">RAM</label>
            <input class="form-control" type="text" name="ram" placeholder="16GB DDR3 1333MHz" id="ram"
                   value="<?= $device['ram'] ?>" required>
        </div>
        <div class="form-group">
            <label for="hdd">HDD</label>
            <input class="form-control" type="text" name="hdd" placeholder="1TB 7200RPM" id="hdd"
                   value="<?= $device['hdd'] ?>" required>
        </div>
        <div class="form-group">
            <label for="fonte">Fonte</label>
            <input class="form-control" type="text" name="fonte" placeholder="400W" id="fonte"
                   value="<?= $device['fonte'] ?>" required>
        </div>
        <div class="form-group">
            <label for="mac">MAC</label>
            <input class="form-control" type="text" name="mac" placeholder="0000:0000:0000:0000" id="mac"
                   value="<?= $device['mac'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input class="form-control" type="text" name="nome" placeholder="PC-REI-18872" id="nome"
                   value="<?= $device['nome'] ?>" required>
        </div>
        <div class="form-group">
            <label for="os">OS</label>
            <input class="form-control" type="text" name="os" placeholder="Windows 10" id="os"
                   value="<?= $device['os'] ?>" required>
        </div>
        <input class="btn btn-block btn-primary" type="submit" value="Atualizar">
    </form>
</div>
</body>
</html>
<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado e possui o grupo de moderador ou admin
require_once 'validaLogin.php';
require_once 'acessoModerador.php';
require_once 'atualizarComputador.php';
?>


<html lang="pt">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Atualizar computador - Computer Manager</title>

	<?php
    // Imports das dependências do projeto
	require_once 'imports.php';
	?>
</head>

<body>

<?php
// Import da Navbar
require_once 'navbar.php';
?>
<!--
    Form de atualização de um computador, preenche os valores dos campos com base
    em um Select no arquivo atualizarComputador.php
-->
<div class="container">
    <div class="row">
        <div class="card-login">
            <div class="card">
                <div class="card-header text-center">
                    Atualizar computador ID: <?= $device['id'] ?>
                </div>
                <div class="card-body">
                    <form action="atualizarComputador.php?id=<?= $device['id'] ?>" method="post">
                        <div class="form-group d-none">
                            <label for="id">ID</label>
                            <input class="form-control" type="text" name="id" placeholder="0"
                                   value="<?= $device['id'] ?>" id="id"
                                   disabled>
                        </div>
                        <div class="form-group">
                            <label for="patrimonial">Patrimonial</label>
                            <input class="form-control" type="number" name="patrimonial" placeholder="000001"
                                   id="patrimonial"
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
                            <input class="form-control" type="text" name="mac" placeholder="0000:0000:0000:0000"
                                   id="mac"
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
            </div>
        </div>
    </div>
</div>
</body>
</html>
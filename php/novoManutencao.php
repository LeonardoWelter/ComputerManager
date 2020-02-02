<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado e possui o grupo de moderador ou admin
require_once 'validaLogin.php';
require_once 'acessoModerador.php';
require_once 'criarComputador.php';
require_once 'status.php';
?>


<html lang="pt">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastrar manutenção - Computer Manager</title>

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
    Form de criação de uma manutenção, envia os valores para criarManutencao.php
-->
<div class="container">
    <div class="row">
        <div class="card-login">
            <div class="card">
                <div class="card-header text-center">
                    Adicionar manutenção
                </div>
                <div class="card-body">
                    <form action="criarManutencao.php" method="post">
                        <div class="form-group d-none">
                            <label for="id">ID</label>
                            <input class="form-control" type="text" name="id" placeholder="0" value="auto" id="id"
                                   disabled>
                        </div>
                        <div class="form-group">
                            <label for="device_pat">Patrimônio</label>
                            <input class="form-control" type="number" name="device_pat" placeholder="000000" id="device_pat"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="cadastroTipo"><i class="fas fa-users mr-1"></i>Tipo</label>
                            <select id="cadastroTipo" name="tipo" class="custom-select" required
                                    onchange="gerarOptions()">
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
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" name="descricao" placeholder="Descrição da manutenção"
                                      id="descricao"
                                      required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="comentarios">Comentários</label>
                            <textarea class="form-control" name="comentarios" placeholder="Comentários da manutenção"
                                      id="comentarios"
                                      required></textarea>
                        </div>
                        <input class="btn btn-block btn-primary" type="submit" value="Criar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //require_once 'rodape.php' ?>
</body>
</html>
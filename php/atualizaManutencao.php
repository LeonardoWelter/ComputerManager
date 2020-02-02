<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado e possui o grupo de moderador ou admin
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
    Form de atualização de uma manutenção, preenche os valores dos campos com base
    em um Select no arquivo atualizarManutencao.php
-->
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
                                   placeholder="000000" value="<?= $maintenance['device_pat'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cadastroTipo">Tipo</label>
                            <!-- Função gerarOptions muda as opções de subtipo conforme o tipo seleciona -->
                            <select id="cadastroTipo" name="tipo" class="custom-select" required
                                    onchange="gerarOptions()">
                                <!-- Gera e seleciona o tipo da manutenção com base em um Select no BD -->
								<?php switchManutencao($maintenance['tipo']); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cadastroSubTipo">Subtipo</label>
                            <select id="cadastroSubTipo" name="subtipo" class="custom-select" required>
                                <option value="" selected disabled>Selecione o Subtipo</option>
                            </select>
                        </div>
                        <script>gerarOptions('<?=$maintenance['subtipo']?>')</script>
                        <div class="form-group">
                            <label for="cadastroDescricao">Descrição</label>
                            <textarea id="cadastroDescricao" name="descricao" class="form-control"
                                      placeholder="Descrição da manutenção"
                                      required><?= $maintenance['descricao'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cadastroComentarios">Comentários</label>
                            <textarea id="cadastroComentarios" name="comentarios" class="form-control"
                                      placeholder="Comentários da manutenção"
                                      required><?= $maintenance['comentarios'] ?></textarea>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
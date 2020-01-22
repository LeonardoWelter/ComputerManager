<?php
require_once 'validaLogin.php';
require_once 'status.php';
?>

<html lang="pt">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastrar usuário - Computer Manager</title>

	<?php
	require_once 'imports.php';
	?>

    <link rel="stylesheet" href="../css/cadastro.css">
</head>

<body>

<?php
require_once 'navbar.php';
?>
<?php
if (isset($_SESSION['status'])) {
	echo mostrarToastr($_SESSION['status']);
}
?>

<div class="container">
    <div class="row">

        <div class="card-login">
            <div class="card">
                <div class="card-header text-center">
                    Cadastrar novo usuário
                </div>
                <div class="card-body">
                    <form action="criarUsuario.php" method="post">
                        <div class="form-group">
                            <label for="cadastroNome"><i class="fas fa-id-card mr-1"></i>Nome</label>
                            <input id="cadastroNome" name="nome" type="text" class="form-control"
                                   placeholder="Nome" required>
                        </div>
                        <div class="form-group">
                            <label for="cadastroUsuario"><i class="fas fa-user mr-1"></i>Usuário</label>
                            <input id="cadastroUsuario" name="usuario" type="text" class="form-control"
                                   placeholder="Usuário" required>
                        </div>
                        <div class="form-group">
                            <label for="cadastroEmail"><i class="fas fa-envelope mr-1"></i>E-mail</label>
                            <input id="cadastroEmail" name="email" type="email" class="form-control"
                                   placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <label for="cadastroSenha"><i class="fas fa-lock mr-1"></i>Senha</label>
                            <input id="cadastroSenha" name="senha" type="password" class="form-control"
                                   placeholder="Senha" required>
                        </div>
                        <div class="form-group">
                            <label for="cadastroGrupo"><i class="fas fa-users mr-1"></i>Grupo</label>
                            <select id="cadastroGrupo" name="grupo" class="custom-select" required>
                                <option value="" selected disabled>Selecione o grupo</option>
                                <option value="admin">Administrador</option>
                                <option value="user">Usuário</option>
                            </select>
                        </div>
                        <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'rodape.php' ?>
</body>
</html>
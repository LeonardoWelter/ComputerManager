<?php
require_once "valida_login.php";
?>

<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Computer Manager</title>

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
                    Cadastrar novo usuário
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['login']) && $_GET['login'] == 'semlogin') {
                        ?>
                        <div class="text-danger text-center mb-2">
                            É necessário realizar login antes de acessar a aplicação!
                        </div>
                        <?php
                    }
                    ?>
                    <form action="novo_usuario.php" method="post">
                        <div class="form-group">
                            <label for="cadastroNome"><i class="fas fa-id-card mr-1"></i></i>Nome</label>
                            <input id="cadastroNome" name="nome" type="text" class="form-control"
                                   placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="cadastroUsuario"><i class="fas fa-user mr-1"></i>Usuário</label>
                            <input id="cadastroUsuario" name="usuario" type="text" class="form-control"
                                   placeholder="Usuário">
                        </div>
                        <div class="form-group">
                            <label for="cadastroEmail"><i class="fas fa-envelope mr-1"></i></i>E-mail</label>
                            <input id="cadastroEmail" name="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label for="cadastroSenha"><i class="fas fa-lock mr-1"></i>Senha</label>
                            <input id="cadastroSenha" name="senha" type="password" class="form-control"
                                   placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <label for="cadastroGrupo"><i class="fas fa-users mr-1"></i></i>Grupo</label>
                            <select id="cadastroGrupo" name="grupo" class="custom-select">
                                <option value="" selected disabled>Selecione o grupo</option>
                                <option value="1">Administrador</option>
                                <option value="2">Usuário</option>
                            </select>
                        </div>
                        <?php
                        if (isset($_GET['login']) && $_GET['login'] == 'erro') {
                            ?>
                            <div class="text-danger text-center">
                                Usuário ou senha inválidos.
                            </div>
                            <script>falhaLogin();</script>
                            <?php
                        }
                        ?>
                        <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</body>
</html>
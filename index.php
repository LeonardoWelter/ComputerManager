<!--
    OK Sistema de Login
    OK Colocar todos os imports de dependencias em um arquivo PHP
    OK Sistema interno de cadastro de novos usuários
    TODO Bloqueio de páginas baseado no grupo
    OK Cadastro de Computadores
    OK Edição de computadores existentes
    OK Remoção de computadores
    OK Listagem de Computadores
    TODO Pesquisa de Computadores
    TODO Manutenção de Computadores
    TODO Página individual do Computador
    TODO Registro de Manutenção
    TODO Histórico de Manutenção do Computador

    TODO Padronização da estilização da interface
    OK Adicionar exit(); após todos os headers
-->
<?php
    require_once 'php/status.php';
?>
<?php
    if(!isset($_SESSION)) {
		session_start();
	}

    if(!isset($_SESSION['status'])) {
		$_SESSION['status'] = null;
	}
?>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Computer Manager</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/index.css">

    <script src="https://kit.fontawesome.com/a98ff00b7e.js" crossorigin="anonymous"></script>

    <script src="js/scripts.js"></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="css/toastr.min.css">
    <script src="js/toastr.min.js"></script>

    <!-- Tratamento de erros -->
</head>

<body>
<?php
if(isset($_SESSION['status'])) {
	echo mostrarToastr($_SESSION['status']);
}
?>

<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="menu.php">
        <img src="img/icons8-gestor-de-networking-64.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Computer Manager">
        Computer Manager
    </a>
</nav>

<div class="container">
    <div class="row">

        <div class="card-login">
            <div class="card">
                <div class="card-header text-center">
                    Login
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
                    <form action="php/login.php" method="post">
                        <div class="form-group">
                            <label for="loginEmail"><i class="fas fa-user mr-1"></i>E-mail</label>
                            <input id="loginEmail" name="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="loginSenha"><i class="fas fa-lock mr-1"></i>Senha</label>
                            <input id="loginSenha" name="senha" type="password" class="form-control"
                                                                   placeholder="Senha">
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
                        <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</body>
</html>
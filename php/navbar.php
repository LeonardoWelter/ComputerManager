<?=

'<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
    <a class="navbar-brand" href="menu.php">
        <img src="../img/icons8-gestor-de-networking-64.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Computer Manager">
        Computer Manager
    </a>
    <!-- Toggler para dispositivos móveis -->
    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav1">
        <i class="fas fa-bars"></i>
    </button>

	<!-- Links da Navegação -->
    <div class="collapse navbar-collapse" id="nav1">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="computadores.php" class="nav-link">Computadores</a></li>
            <li class="nav-item"><a href="manutencoes.php" class="nav-link">Manutenções</a></li>
            <li class="nav-item"><a href="usuarios.php" class="nav-link">Usuários</a></li>
            <li class="nav-item"><a href="cadastro.php" class="nav-link">Cadastro</a></li>
            <li class="nav-item divisor"></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Sair</a></li>
        </ul>
    </div>
</nav>'

?>

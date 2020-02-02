<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Navbar compartilhada pelo projeto;

echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark ">';
echo '<a class="navbar-brand" href="menu.php">';
echo'<img src="../img/icons8-gestor-de-networking-64.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Computer Manager">
        Computer Manager
    </a>';
echo '<!-- Toggler para dispositivos móveis -->';
echo '<button class="navbar-toggler" data-toggle="collapse" data-target="#nav1">
        <i class="fas fa-bars"></i>
    </button>';

echo '<!-- Links da Navegação -->';
    echo'<div class="collapse navbar-collapse" id="nav1">';
    echo '<ul class="navbar-nav ml-auto">';
    echo '<li class="nav-item"><a href="computadores.php" class="nav-link">Computadores</a></li>';
    echo '<li class="nav-item"><a href="manutencoes.php" class="nav-link">Manutenções</a></li>';
            // Renderiza o botão usuários caso o usuário seja do grupo Admin
            if($_SESSION['grupo'] == 'admin') {
				echo '<li class="nav-item"><a href="usuarios.php" class="nav-link">Usuários</a></li>';
			}
    echo '<li class="nav-item divisor"></li>';
    echo '<li class="nav-item"><a href="logout.php" class="nav-link">Sair</a></li>';
    echo '</ul>';
    echo '</div>';
echo '</nav>';

?>

<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Destrói a sessão
session_start();
session_destroy();
// Redireciona para a página de login
header('Location: ../index.php');
exit();

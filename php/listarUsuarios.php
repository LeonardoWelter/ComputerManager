<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado
require_once 'validaLogin.php';

if (!isset($_SESSION)) {
    session_start();
}

// Função que realiza a conexão com o banco de dados usando PDO
function pdo_connect_mysql()
{
    $DATABASE_HOST = 'localhost'; // Host do Banco de Dados
    $DATABASE_USER = 'CM_User'; // Usuário
    $DATABASE_PASS = 's3nh4*'; // Senha
    $DATABASE_NAME = 'ComputerManager'; // Database
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
		// Caso dê erro na conexão, ao invés de interromper a execução, ele retorna ao menu
		// com o código de erro falhaErroCriticoSQL
        $_SESSION['status'] = 'falhaErroCriticoSQL';
        header('Location: menu.php');
        exit();
    }
}

// Variáveis responsáveis pelo Sort da tabela
$colunas = array('id', 'nome', 'usuario', 'email');
$coluna = isset($_GET['coluna']) && in_array($_GET['coluna'], $colunas) ? $_GET['coluna'] : $colunas[0];
$ordem = isset($_GET['ordem']) && strtolower($_GET['ordem']) == 'desc' ? 'DESC' : 'ASC';
$cima_baixo = str_replace(array('ASC', 'DESC'), array('up', 'down'), $ordem);
$cre_dec = $ordem == 'ASC' ? 'desc' : 'asc';

// Variável responsável pela busca na tabela, adiciona % em torno do campo para utilizar na pesquisa com LIKE
$busca = isset($_GET['busca']) ? '%' . trim($_GET['busca']) . '%' : null;

// Conecta com a banco de dados
$pdo = pdo_connect_mysql();

// Realiza um Select para contar a quantidade de registros para o Sort, caso exista uma busca, ajusta os valores.
if (!isset($_GET['busca'])) {
    $totalResultados = $pdo->query('SELECT count(*) from users')->fetchColumn();
} else {
    $totalResultados = $pdo->query("SELECT count(*) FROM users WHERE id LIKE '$busca' OR nome LIKE '$busca' OR usuario LIKE '$busca' OR email LIKE '$busca' OR grupo LIKE '$busca'")->fetchColumn();
}

// Recupera a página atual através do GET
$pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) && $_GET['pagina'] > 1 ? $_GET['pagina'] : 1;
// Define a quantidade de resultados por página
$resultadosPagina = 5;

// Realiza o Select no banco de dados, caso não haja nenhuma busca, simplesmente da um Select limitado pela paginação
if (!isset($_GET['busca'])) {
    $calcPagina = ($pagina - 1) * $resultadosPagina;
    $stmt = $pdo->prepare("SELECT * FROM users ORDER BY $coluna $ordem LIMIT $calcPagina, $resultadosPagina");
    $stmt->execute();
} else {
	// Caso haja um busca, realiza o Select filtrando pelo valor da busca, limitado pela paginação
	$calcPagina = ($pagina - 1) * $resultadosPagina;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE 
                                    id LIKE ? OR nome LIKE ? OR usuario LIKE ? OR email LIKE ? OR grupo LIKE ?
                                    ORDER BY $coluna $ordem LIMIT $calcPagina, $resultadosPagina");
    $stmt->execute([$busca, $busca, $busca, $busca, $busca]);
}

// Retorna os valores encontrados para podermos usá-lo no Front End
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fecha a conexão com o banco de dados
$pdo = null;

<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Requires para verificar se o usuário está logado e possui o grupo moderador ou admin
require_once 'validaLogin.php';
require_once 'acessoModerador.php';

// Função que realiza a conexão com o banco de dados usando PDO
function pdo_connect_mysql()
{
	$DATABASE_HOST = 'localhost'; // Host do banco de dados
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

// Conecta ao banco de dados
$pdo = pdo_connect_mysql();
// Seta a Timezone para a do Brasil
date_default_timezone_set('America/Sao_Paulo');

// Verifica se o POST não está vazio
if (!empty($_POST)) {
	// Caso não esteja vazio, insere um novo registro
	// FailSafe caso o formulário seja enviado sem nenhum valor;
	$id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
	$device_pat = isset($_POST['device_pat']) ? $_POST['device_pat'] : '';
	$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
	$subtipo = isset($_POST['subtipo']) ? $_POST['subtipo'] : '';
	$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : '';
	$comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : '';
	$data = date('d/m/Y');
	$criador = $_SESSION['usuario'];
	// Insere um novo registro no banco de dados
	$stmt = $pdo->prepare('INSERT INTO maintenance (id, device_pat, tipo, subtipo, descricao, comentarios, data, criador) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
	$stmt->execute([$id, $device_pat, $tipo, $subtipo, $descricao, $comentarios, $data, $criador]);

	// Retorna a mensagem de sucesso e redireciona para a listagem de manutenções
	$_SESSION['status'] = 'sucessoAdicionarManutencao';
	header('Location: manutencoes.php');
	exit();
}
// Fecha a conexão com o Banco de Dados
$pdo = null;
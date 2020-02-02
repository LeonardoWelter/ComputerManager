<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Converte o Usuário para o Nome do usuário
function converteUsuario($usuario) {
    require_once 'mostrarManutencao.php';

    $arrayUsuario = selecionaUsuario($usuario);

    return $arrayUsuario['nome'];
}

// Recebe um tipo e retorna ele formatado
function converteTipo($tipo) {

    switch ($tipo) {
        case 'hardware':
            $retorno = 'Hardware';
            break;
        case 'software':
            $retorno = 'Software';
            break;
		case 'rede':
			$retorno = 'Rede';
			break;
		case 'outro':
			$retorno = 'Outro';
			break;
        default:
            $retorno = 'Desconhecido';
            break;
    }

    return $retorno;
}

// Recebe um subtipo e retorna ele formatado
function converteSubTipo($subtipo) {

	$subtipos = array();

	$subtipos['remoção'] = 'Remoção';
	$subtipos['adição'] = 'Adição';
	$subtipos['substituição'] = 'Substituição';
	$subtipos['instalação'] = 'Instalação';
	$subtipos['atualização'] = 'Atualização';
	$subtipos['desinstalação'] = 'Desinstalação';
	$subtipos['imageação'] = 'Imageação';
	$subtipos['configuração'] = 'Configuração';

	$retorno = null;
	foreach ($subtipos as $key => $valor) {
		if ($key == $subtipo) {
			$retorno =  $valor;
			break;
		}
	}

    return $retorno;
}

// Converte o Patrimonio de um computador no nome do mesmo
function converteComputadorLista($pat_computador) {
    require_once 'listarManutencoes.php';

    $arrayComputador = selecionaComputador($pat_computador);

    return $arrayComputador['nome'];
}

// Converte o Patrimonio de um computador no nome do mesmo
function converteComputador($pat_computador) {
    require_once 'mostrarManutencao.php';

    $arrayComputador = selecionaComputador($pat_computador);

    return $arrayComputador['nome'];
}

//Recebe um tipo e faz um Switch para selecionar a opção recebida
function switchManutencao($tipo) {
	switch ($tipo) {
		case 'hardware':
			echo '<option value="" disabled>Selecione o Tipo</option>';
			echo '<option value="hardware" selected>Hardware</option>';
			echo '<option value="software">Software</option>';
			echo '<option value="rede">Rede</option>';
			echo '<option value="outro">Outro</option>';
			break;
		case 'software':
			echo '<option value="" disabled>Selecione o Tipo</option>';
			echo '<option value="hardware">Hardware</option>';
			echo '<option value="software" selected>Software</option>';
			echo '<option value="rede">Rede</option>';
			echo '<option value="outro">Outro</option>';
			break;
		case 'rede':
			echo '<option value="" disabled>Selecione o Tipo</option>';
			echo '<option value="hardware">Hardware</option>';
			echo '<option value="software">Software</option>';
			echo '<option value="rede" selected>Rede</option>';
			echo '<option value="outro">Outro</option>';
			break;
		case 'outro':
			echo '<option value="" disabled>Selecione o Tipo</option>';
            echo '<option value="hardware">Hardware</option>';
            echo '<option value="software">Software</option>';
            echo '<option value="rede">Rede</option>';
            echo '<option value="outro" selected>Outro</option>';
			break;
		default:
			echo '<option value="" selected disabled>Selecione o Tipo</option>';
			echo '<option value="hardware">Hardware</option>';
			echo '<option value="software">Software</option>';
			echo '<option value="rede">Rede</option>';
			echo '<option value="outro">Outro</option>';
			break;
	}
}
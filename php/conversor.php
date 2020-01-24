<?php

function converteUsuario($usuario) {
    require_once 'mostrarManutencao.php';

    $arrayUsuario = selecionaUsuario($usuario);

    return $arrayUsuario['nome'];
}

function converteTipo($tipo) {

    switch ($tipo) {
        case 'hardware':
            $retorno = 'Hardware';
            break;
        case 'software':
            $retorno = 'Software';
            break;
        default:
            $retorno = 'Desconhecido';
            break;
    }

    return $retorno;
}

function converteSubTipo($subtipo) {

    switch ($subtipo) {
        case 'instalacao':
            $retorno = 'Instalação';
            break;
        case 'substituicao':
            $retorno = 'Substituição';
            break;
        default:
            $retorno = 'Desconhecido';
            break;
    }

    return $retorno;
}

function converteComputadorLista($pat_computador) {
    require_once 'listarManutencoes.php';

    $arrayComputador = selecionaComputador($pat_computador);

    return $arrayComputador['nome'];
}

function converteComputador($pat_computador) {
    require_once 'mostrarManutencao.php';

    $arrayComputador = selecionaComputador($pat_computador);

    return $arrayComputador['nome'];
}

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
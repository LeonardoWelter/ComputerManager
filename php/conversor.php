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
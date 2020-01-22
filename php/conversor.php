<?php

function converteUsuario($id) {
    require_once 'mostrarManutencao.php';

    $arrayUsuario = selecionaUsuario($id);

    return $arrayUsuario['nome'];
}

function converteTipo($tipo) {

    switch ($tipo) {
        case 1:
            $retorno = 'Hardware';
            break;
        case 2:
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
        case 1:
            $retorno = 'Instalação';
            break;
        case 2:
            $retorno = 'Atualização';
            break;
        default:
            $retorno = 'Desconhecido';
            break;
    }

    return $retorno;
}

function converteComputadorLista($id_computador) {
    require_once 'listarManutencao.php';

    $arrayComputador = selecionaComputador($id_computador);

    return $arrayComputador['nome'];
}

function converteComputador($id_computador) {
    require_once 'mostrarManutencao.php';

    $arrayComputador = selecionaComputador($id_computador);

    return $arrayComputador['nome'];
}
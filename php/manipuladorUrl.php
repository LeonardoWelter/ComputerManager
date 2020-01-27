<?php
// Minha obra prima


$url = isset($_POST['url']) ? $_POST['url'] : null;
$valorBusca = isset($_POST['valorBusca']) ? $_POST['valorBusca'] : null;
$redir = isset($_POST['redir']) ? $_POST['redir'] : null;
$novaUrl = null;

if(isset($url) && isset($valorBusca)) {
	addParamURL($url, array('busca' => $valorBusca), $redir);
}

function addParamURL($url, $arrayParamValor, $redir) {

    $url_parts = parse_url($url);
    // If URL doesn't have a query string.
    if (isset($url_parts['query'])) { // Avoid 'Undefined index: query'
        parse_str($url_parts['query'], $parametros);
    } else {
        $parametros = array();
    }

    foreach($arrayParamValor as $key => $paramValor) {
        $parametros[$key] = $paramValor;
    }

    // Note that this will url_encode all values
    $url_parts['query'] = http_build_query($parametros);

    $novaUrl = $url_parts['scheme'] . '://' . $url_parts['host'] . ':' . $url_parts['port'] . $url_parts['path'] . '?' . $url_parts['query'];

    if (!$redir) {
        return $novaUrl;
    } else {
        header("Location: $novaUrl");
    }
}

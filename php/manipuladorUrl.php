<?php

function adicionaParametroURL($url, $novoParametro, $novoValor) {

	$url_parts = parse_url($url);
	// If URL doesn't have a query string.
	if (isset($url_parts['query'])) { // Avoid 'Undefined index: query'
		parse_str($url_parts['query'], $parametros);
	} else {
		$parametros = array();
	}

	$parametros[$novoParametro] = $novoValor;

// Note that this will url_encode all values
	$url_parts['query'] = http_build_query($parametros);

// If not
	return $url_parts['scheme'] . '://' . $url_parts['host']. ':' . $url_parts['port'] . $url_parts['path'] . '?' . $url_parts['query'];
}
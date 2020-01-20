<?php
// O que caralhos eu fiz aqui?????????


$url1 = isset($_POST['url']) ? $_POST['url'] : null;
$novoParametro1 = 'busca';
$novoValor1 = isset($_POST['valorBusca']) ? $_POST['valorBusca'] : null;
$redir = isset($_POST['redir']) ? $_POST['redir'] : null;
$parametro2 = null;
$valor2 = null;
$novaUrl = null;

if(isset($url1) && isset($novoValor1)) {
	adicionaParametroURL($url1, $novoParametro1, $novoValor1, $parametro2, $valor2, $redir);
}

function adicionaParametroURL($url, $novoParametro, $novoValor, $parametro2, $valor2, $redir) {

	//if(!isset($novaUrl)) {
		$url_parts = parse_url($url);
		// If URL doesn't have a query string.
		if (isset($url_parts['query'])) { // Avoid 'Undefined index: query'
			parse_str($url_parts['query'], $parametros);
		} else {
			$parametros = array();
		}

		$parametros[$novoParametro] = $novoValor;
		if (isset($parametro2) && isset($valor2)) {
			$parametros[$parametro2] = $valor2;
		}

		// Note that this will url_encode all values
		$url_parts['query'] = http_build_query($parametros);

		$novaUrl = $url_parts['scheme'] . '://' . $url_parts['host'] . ':' . $url_parts['port'] . $url_parts['path'] . '?' . $url_parts['query'];

		if (!$redir) {
			return $novaUrl;
		} else {
			header("Location: $novaUrl");
		}
//	} else {
//		$url_parts = parse_url($novaUrl);
//		// If URL doesn't have a query string.
//		if (isset($url_parts['query'])) { // Avoid 'Undefined index: query'
//			parse_str($url_parts['query'], $parametros);
//		} else {
//			$parametros = array();
//		}
//
//		$parametros[$novoParametro] = $novoValor;
//
//		// Note that this will url_encode all values
//		$url_parts['query'] = http_build_query($parametros);
//
//		$novaUrl = $url_parts['scheme'] . '://' . $url_parts['host'] . ':' . $url_parts['port'] . $url_parts['path'] . '?' . $url_parts['query'];
//		return $novaUrl;
//	}
}
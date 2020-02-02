<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Função para adicionar parametros via GET a URL para evitar que ao inserir novos parametros os antigos sejam removidos

// Variáveis retornados via GET
$url = isset($_POST['url']) ? $_POST['url'] : null;
$valorBusca = isset($_POST['valorBusca']) ? $_POST['valorBusca'] : null;
$redir = isset($_POST['redir']) ? $_POST['redir'] : null;
$novaUrl = null;

// Caso haja uma busca, a função precisa ser chamado por esse IF, e é necessário o redirecionamento
if(isset($url) && isset($valorBusca)) {
	addParamURL($url, array('busca' => $valorBusca, 'pagina' => 1), $redir);
}

// Função addParamURL, recebe três parametros $url que é a URL de origem da requisição
// $arrayParamValor é um array contendo os parametros e valores que serão adicionados à URL
// $redir verifica se é necessário redirecionar para URL após a execução da função ou não (necessário em caso de busca).
function addParamURL($url, $arrayParamValor, $redir) {

	// Realiza um parse na URL para dividi-la para podermos tratá-la
    $url_parts = parse_url($url);
    // Verifica se a URL já possui parametros GET
    if (isset($url_parts['query'])) { // Evitando Undefined index: Query
        parse_str($url_parts['query'], $parametros);
    } else {
        $parametros = array();
    }

    //Loop que adiciona os parametros e valores presentes no array recebido
    foreach($arrayParamValor as $key => $paramValor) {
        $parametros[$key] = $paramValor;
    }

    // Realiza o encode da URL com os novos valores
    $url_parts['query'] = http_build_query($parametros);

    // "Monta" a URL
    $novaUrl = $url_parts['scheme'] . '://' . $url_parts['host'] . ':' . $url_parts['port'] . $url_parts['path'] . '?' . $url_parts['query'];

    // Caso não seja preciso o redirecionamento só retorna a URL (utilizado nos headers das tabelas para Sort)
    if (!$redir) {
        return $novaUrl;
    } else {
    	// Caso seja necessário redirecionamento, redireciona para a URL (utilizado na busca)
        header("Location: $novaUrl");
    }
}

<?php

function mostrarToastr($erro) {

	switch ($erro) {
		case 'sucessoLogin':
			$retorno = '<script>toastr["success"]("Login realizado com sucesso", "Sucesso")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaLoginIncorreto':
			$retorno = '<script>toastr["error"]("Usuário ou senha incorretos", "Erro no login")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaRemoverIdErrado':
			$retorno = '<script>toastr["error"]("ID inválido", "Erro ao remover")</script>';
			$_SESSION['status'] = null;
			break;
		case 'sucessoRemoverComputador':
			$retorno = '<script>toastr["success"]("Computador removido com sucesso", "Sucesso")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaRemoverSemId':
			$retorno = '<script>toastr["error"]("Não foi recebido nenhum ID", "Erro ao remover")</script>';
			$_SESSION['status'] = null;
			break;
		case 'sucessoAdicionarComputador':
			$retorno = '<script>toastr["success"]("Computador adicionado", "Sucesso")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaNecessarioLogin':
			$retorno = '<script>toastr["error"]("É preciso fazer login para acessar a aplicação", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		default:
			$retorno = '<script>toastr["error"]("Erro desconhecido, tente novamente", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
	}

	return $retorno;
}

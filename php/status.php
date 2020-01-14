<?php

function mostrarToastr($erro)
{

	switch ($erro) {
		case 'falhaErroCriticoSQL':
			$retorno = '<script>toastr["error"]("Contate o suporte imediatamente", "Erro de SQL")</script>';
			$_SESSION['status'] = null;
			break;
		case 'sucessoLogin':
			$retorno = '<script>toastr["success"]("Login realizado", "Sucesso")</script>';
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
			$retorno = '<script>toastr["success"]("Computador removido", "Sucesso")</script>';
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
		case 'sucessoAtualizarComputador':
			$retorno = '<script>toastr["success"]("Computador atualizado", "Sucesso")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaCriarUsuarioSemDados':
			$retorno = '<script>toastr["error"]("Favor preencher todos os campos", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaCriarUsuarioIncompleto':
			$retorno = '<script>toastr["error"]("Favor completar o formulário de cadastro", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaCriarUsuarioEmail':
			$retorno = '<script>toastr["error"]("Email inválido (nome@email.com)", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaCriarUsuarioInvalido':
			$retorno = '<script>toastr["error"]("Usuário inválido (Somente carácteres alfanúmericos)", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaCriarUsuarioSenhaCurta':
			$retorno = '<script>toastr["error"]("Senha deve conter entre 5 e 20 caracteres", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaCriarUsuarioExistente':
			$retorno = '<script>toastr["error"]("Usuário já existente", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaCriarUsuarioSQL':
			$retorno = '<script>toastr["error"]("Entre em contato com o suporte", "Erro de SQL")</script>';
			$_SESSION['status'] = null;
			break;
		case 'sucessoCriarUsuario':
			$retorno = '<script>toastr["success"]("Usuário cadastrado", "Sucesso")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaLoginSemDados':
			$retorno = '<script>toastr["error"]("Favor preencher ambos os campos", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaAtualizarIdErrado':
			$retorno = '<script>toastr["error"]("O ID selecionado não existe", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaAtualizarSemId':
			$retorno = '<script>toastr["error"]("Nenhum ID especificado", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaMostrarIdErrado':
			$retorno = '<script>toastr["error"]("O ID selecionado não existe1", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		case 'falhaMostrarIdErrado2':
			$retorno = '<script>toastr["error"]("O ID selecionado não existe2", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
		default:
			$retorno = '<script>toastr["error"]("Erro desconhecido, tente novamente", "Erro")</script>';
			$_SESSION['status'] = null;
			break;
	}

	return $retorno;
}
/*
 *
 *
 *
 *
 */



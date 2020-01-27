<?php

function mostrarToastr($erro) {
	//$erros[CódigoDoErro] = [Texto do erro, Titulo do Erro, Tipo do Toastr];
	$erros = array();
	$erros['falhaDesconhecida'] = ['Erro desconhecido, tente novamente', 'Erro', 'error'];
	$erros['falhaErroCriticoSQL'] = ['Contate o suporte imediatamente', 'Erro de SQL', 'error'];
	$erros['sucessoLogin'] = ['Login realizado', 'Sucesso', 'success'];
	$erros['falhaLoginIncorreto'] = ['Usuário ou senha incorretos', 'Erro no login', 'error'];
	$erros['falhaRemoverIdErrado'] = ['ID inválido', 'Erro ao remover', 'error'];
	$erros['sucessoRemoverComputador'] = ['Computador removido', 'Sucesso', 'success'];
	$erros['falhaRemoverSemId'] = ['Não foi recebido nenhum ID', 'Erro ao remover', 'error'];
	$erros['sucessoAdicionarComputador'] = ['Computador adicionado', 'Sucesso', 'success'];
	$erros['falhaNecessarioLogin'] = ['É preciso fazer login para acessar a aplicação', 'Erro', 'error'];
	$erros['sucessoAtualizarComputador'] = ['Computador atualizado', 'Sucesso', 'success'];
	$erros['falhaCriarUsuarioSemDados'] = ['Favor preencher todos os campos', 'Erro', 'error'];
	$erros['falhaCriarUsuarioIncompleto'] = ['Favor completar o formulário de cadastro', 'Erro', 'error'];
	$erros['falhaCriarUsuarioEmail'] = ['Email inválido (nome@email.com)', 'Erro', 'error'];
	$erros['falhaCriarUsuarioInvalido'] = ['Usuário inválido (Somente carácteres alfanúmericos)', 'Erro', 'error'];
	$erros['falhaCriarUsuarioSenhaCurta'] = ['Senha deve conter entre 5 e 20 caracteres', 'Erro', 'error'];
	$erros['falhaCriarUsuarioExistente'] = ['Usuário já existente', 'Erro', 'error'];
	$erros['falhaCriarUsuarioSQL'] = ['Entre em contato com o suporte', 'Erro de SQL', 'error'];
	$erros['sucessoCriarUsuario'] = ['Usuário cadastrado', 'Sucesso', 'success'];
	$erros['falhaLoginSemDados'] = ['Favor preencher ambos os campos', 'Erro', 'error'];
	$erros['falhaAtualizarIdErrado'] = ['O ID selecionado não existe', 'Erro', 'error'];
	$erros['falhaAtualizarSemId'] = ['Nenhum ID especificado', 'Erro', 'error'];
	$erros['falhaMostrarIdErrado'] = ['Nenhum ID especificado', 'Erro', 'error'];
	$erros['falhaMostrarIdErrado2'] = ['O ID selecionado não existe2', 'Erro', 'error'];
	$erros['falhaSemPermissao'] = ['Você não possui permissão para acessar esse recurso', 'Erro', 'error'];
	$erros['sucessoRemoverUsuario'] = ['Usuário removido', 'Sucesso', 'success'];
	$erros['sucessoRemoverManutencao'] = ['Manutenção removida', 'Sucesso', 'success'];
	$erros['sucessoAtualizarManutencao'] = ['Manutenção Atualizada', 'Sucesso', 'success'];
	$erros['sucessoAtualizarUsuario'] = ['Usuário atualizado', 'Sucesso', 'success'];
	$erros['sucessoAdicionarManutencao'] = ['Manutenção adicionada', 'Sucesso', 'success'];

	$saidaTexto = $erros[$erro][0];
	$saidaTitulo = $erros[$erro][1];
	$saidaTipo = $erros[$erro][2];

	$retorno = "<script>toastr['$saidaTipo']('$saidaTexto', '$saidaTitulo')</script>";
	$_SESSION['status'] = null;
	return $retorno;
}
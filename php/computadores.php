<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Require para verificar se o usuário está logado
require_once 'validaLogin.php';
require_once 'listarComputadores.php';
require_once 'status.php';
require_once 'manipuladorUrl.php';

if (!isset($_SESSION)) {
	session_start();
}

// Define a URL atual para uso na função addParamURL
$urlAtual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>


<html lang="pt">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Computadores - Computer Manager</title>

	<?php
	// Imports das dependências
	require_once 'imports.php';
	?>

    <link rel="stylesheet" href="../css/computadores.css">
    <link rel="stylesheet" href="../css/tabelas.css">

</head>

<body>

<?php
    //Import da NavBar
    require_once 'navbar.php';
?>
<?php
    // Função responsável pela chamada do Popup das informações de Status do Sistema
    if (isset($_SESSION['status'])) {
        echo mostrarToastr($_SESSION['status']);
    }
?>

<?php
// Modal que aparece quando tentamos apagar algum registro
if (isset($_GET['apaga'])) {
	?>
    <!-- Modal apagar -->
    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExcluirLabel">Remover Computador</h5>
                </div>
                <div class="modal-body">
                    Remover o computador ID: <?= $_GET['apaga']; ?>?
                </div>
                <div class="modal-footer">
                    <a href="computadores.php" class="btn btn-secondary">Cancelar</a>
                    <a href="apagarComputador.php?id=<?= $_GET['apaga'] ?>&confirma=sim"
                       class="btn btn-danger">Remover</a>
                </div>
            </div>
        </div>
    </div>
	<?php
	echo "<script>$('#modalExcluir').modal({backdrop: 'static', keyboard: false, show: true})</script>";
}
?>

<div class="container">
    <h2 class="mt-3 linha">Computadores</h2>
    <div class="btn-group d-flex float-right mt-1">
        <form action="manipuladorUrl.php" method="post">
            <div class="input-group">
                <input class="form-control d-none" name="url" type="text" value="<?= $urlAtual ?>">
                <input class="form-control d-none" name="redir" type="text" value="true">
                <input class="form-control" id="buscar" name="valorBusca" type="text"
                       value="<?= isset($_GET['busca']) ? $_GET['busca'] : null; ?>"
                       placeholder="Pesquisar">
                <span class="input-group-append">
                    <input class="btn btn-sm btn-outline-primary" type="submit" value="Pesquisar">
                    </span>
            </div>
        </form>
    </div>
	<?php if ($_SESSION['grupo'] != 'user') { ?>
        <!-- Caso o usuário sej ado grupo moderador ou admin, renderiza o botão de adição de computador -->
        <div class="btn-group d-flex float-right mt-1 mr-2">
            <a href="novoComputador.php" class="btn btn-sm btn-outline-primary">Adicionar computador</a>
        </div>
	<?php } ?>

    <!-- Controle da paginação -->
	<?php if (ceil($totalResultados / $resultadosPagina) > 0): ?>
        <nav class="mt-2">
            <ul class="pagination">
				<?php if ($pagina > 1): ?>
                    <li class="page-item"><a class="page-link"
                                             href="<?= addParamURL($urlAtual, $parametros = array('pagina' => $pagina - 1), null) ?>">Anterior</a>
                    </li>
				<?php else: ?>
                    <li class="page-item disabled"><a class="page-link"
                                                      href="<?= addParamURL($urlAtual, $parametros = array('pagina' => $pagina - 1), null) ?>">Anterior</a>
                    </li>
				<?php endif; ?>

				<?php if ($pagina > 3): ?>
                    <li class="page-item"><a class="page-link"
                                             href="<?= addParamURL($urlAtual, $parametros = array('pagina' => 1), null) ?>">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
				<?php endif; ?>

				<?php if ($pagina - 2 > 0): ?>
                    <li class="page-item"><a class="page-link"
                                             href="<?= addParamURL($urlAtual, $parametros = array('pagina' => $pagina - 2), null) ?>"><?php echo $pagina - 2 ?></a>
                    </li><?php endif; ?>
				<?php if ($pagina - 1 > 0): ?>
                    <li class="page-item"><a class="page-link"
                                             href="<?= addParamURL($urlAtual, $parametros = array('pagina' => $pagina - 1), null) ?>"><?php echo $pagina - 1 ?></a>
                    </li><?php endif; ?>

                <li class="page-item active"><a class="page-link"
                                                href="<?= addParamURL($urlAtual, $parametros = array('pagina' => ''), null) ?>"><?php echo $pagina ?></a>
                </li>

				<?php if ($pagina + 1 < ceil($totalResultados / $resultadosPagina) + 1): ?>
                    <li class="page-item"><a class="page-link"
                                             href="<?= addParamURL($urlAtual, $parametros = array('pagina' => $pagina + 1), null) ?>"><?php echo $pagina + 1 ?></a>
                    </li><?php endif; ?>
				<?php if ($pagina + 2 < ceil($totalResultados / $resultadosPagina) + 1): ?>
                    <li class="page-item"><a class="page-link"
                                             href="<?= addParamURL($urlAtual, $parametros = array('pagina' => $pagina + 2), null) ?>"><?php echo $pagina + 2 ?></a>
                    </li><?php endif; ?>

				<?php if ($pagina < ceil($totalResultados / $resultadosPagina) - 2): ?>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link"
                                             href="<?= addParamURL($urlAtual, $parametros = array('pagina' => ceil($totalResultados / $resultadosPagina)), null) ?>"><?php echo ceil($totalResultados / $resultadosPagina) ?></a>
                    </li>
				<?php endif; ?>

				<?php if ($pagina < ceil($totalResultados / $resultadosPagina)): ?>
                    <li class="page-item"><a class="page-link"
                                             href="<?= addParamURL($urlAtual, $parametros = array('pagina' => $pagina + 1), null) ?>">Próxima</a>
                    </li>
				<?php else: ?>
                    <li class="page-item disabled"><a class="page-link"
                                                      href="<?= addParamURL($urlAtual, $parametros = array('pagina' => $pagina + 1), null) ?>">Próxima</a>
                    </li>
				<?php endif; ?>
            </ul>
        </nav>
	<?php endif; ?>


    <!-- Tabela que lista os computadores no banco de dados -->
    <table class="table table-striped table-bordered table-responsive-sm">
        <thead>
        <tr>
            <th>
                <a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'id', 'ordem' => $cre_dec), null) ?>">
                    ID<i class="fas fa-sort<?php echo $coluna == 'id' ? '-' . $cima_baixo : ''; ?>"></i>
                </a>
            </th>
            <th>
                <a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'patrimonial', 'ordem' => $cre_dec), null) ?>">
                    Patrimonial<i
                            class="fas fa-sort<?php echo $coluna == 'patrimonial' ? '-' . $cima_baixo : ''; ?>"></i>
                </a>
            </th>
            <th>
                <a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'marca', 'ordem' => $cre_dec), null) ?>">
                    Marca<i class="fas fa-sort<?php echo $coluna == 'marca' ? '-' . $cima_baixo : ''; ?>"></i>
                </a>
            </th>
            <th>
                <a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'modelo', 'ordem' => $cre_dec), null) ?>">
                    Modelo<i class="fas fa-sort<?php echo $coluna == 'modelo' ? '-' . $cima_baixo : ''; ?>"></i>
                </a>
            </th>
            <th>
                <a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'cpu', 'ordem' => $cre_dec), null) ?>">
                    CPU<i class="fas fa-sort<?php echo $coluna == 'cpu' ? '-' . $cima_baixo : ''; ?>"></i>
                </a>
            </th>
            <th>
                <a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'nome', 'ordem' => $cre_dec), null) ?>">
                    Nome<i class="fas fa-sort<?php echo $coluna == 'nome' ? '-' . $cima_baixo : ''; ?>"></i>
                </a>
            </th>
            <th>
                <a href="<?= addParamURL($urlAtual, $parametros = array('coluna' => 'os', 'ordem' => $cre_dec), null) ?>">
                    OS<i class="fas fa-sort<?php echo $coluna == 'os' ? '-' . $cima_baixo : ''; ?>"></i>
                </a>
            </th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <!-- Tabela gerada programaticamente, contendo todos os computadores registrados no banco de dados -->
		<?php foreach ($devices as $device): ?>
            <tr>
                <td><?= $device['id'] ?></td>
                <td><?= $device['patrimonial'] ?></td>
                <td><?= $device['marca'] ?></td>
                <td><?= $device['modelo'] ?></td>
                <td><?= $device['cpu'] ?></td>
                <td><?= $device['nome'] ?></td>
                <td><?= $device['os'] ?></td>
                <td class="text-right">
                    <a href="computador.php?id=<?= $device['id'] ?>" class="btn btn-sm btn-primary"><i
                                class="fas fa-search"></i></a>
					<?php if ($_SESSION['grupo'] != 'user') { ?>
                        <!-- Renderiza o botão de edição caso o usuário for moderador ou admin -->
                        <a href="atualizaComputador.php?id=<?= $device['id'] ?>" class="btn btn-sm btn-primary"><i
                                    class="fas fa-pen"></i></a>
					<?php } ?>
					<?php if ($_SESSION['grupo'] == 'admin') { ?>
                        <!-- Renderiza o botão de remoção caso o usuário for admin -->
                        <a href="<?= addParamURL($urlAtual, $parametros = array('apaga' => $device['id']), null) ?>"
                           class="btn btn-sm btn-danger"><i
                                    class="fas fa-trash"></i></a>
					<?php } ?>
                </td>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require_once 'rodape.php' ?>
</body>
</html>
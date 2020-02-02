<?php
/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Require para verificar se o usuário está logado
require_once 'validaLogin.php';
require_once 'mostrarComputador.php';
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
    <title>Computador ID <?= $device['id'] ?> - Computer Manager</title>

	<?php
    // Imports das dependências
	require_once 'imports.php';
	?>

    <link rel="stylesheet" href="../css/computador.css">
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
                    <h5 class="modal-title" id="modalExcluirLabel">Remover manutenção</h5>
                </div>
                <div class="modal-body">
                    Remover a manutenção ID: <?= $_GET['apaga']; ?>?
                </div>
                <div class="modal-footer">
                    <a href="computador.php?id=<?= $_GET['id'] ?>" class="btn btn-secondary">Cancelar</a>
                    <a href="apagarManutencao.php?id=<?= $_GET['apaga'] ?>&confirma=sim"
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


    <div class="container">
        <h2 class="mt-3 linha"><?= $device['nome'] ?></h2>
        <div class="btn-group d-flex float-right mt-1">
            <a href="computadores.php" class="btn btn-sm btn-outline-primary">Computadores</a>
            <?php if ($_SESSION['grupo'] != 'user') { ?>
            <!-- Renderiza os botões de ação somente se o usuário for Moderador ou Admin -->
            <a href="atualizaComputador.php?id=<?= $device['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
            <a href="#" class="btn btn-sm btn-outline-primary">Ligar</a>
            <?php } ?>
        </div>

        <!-- Tabela preenchida com as informações do banco de dados -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered tabela">
                <caption>Informações do computador de ID: <?= $device['id'] ?></caption>
                <thead class="thead text-center">
                <tr>
                    <th colspan="2">Computador ID: <?= $device['id'] ?></th>
                </tr>
                </thead>
                <tr>
                    <td class="font-weight-bold">ID</td>
                    <td><?= $device['id'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nome</td>
                    <td><?= $device['nome'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Patrimonial</td>
                    <td><?= $device['patrimonial'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Marca</td>
                    <td><?= $device['marca'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Modelo</td>
                    <td><?= $device['modelo'] ?></td>
                </tr>
                <thead class="thead text-center font-weight-bold">
                <tr>
                    <th colspan="2">Especificações</th>
                </tr>
                </thead>
                <tr>
                    <td class="font-weight-bold"><i class="fas fa-microchip"></i> CPU</td>
                    <td><?= $device['cpu'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><i class="fas fa-memory"></i> RAM</td>
                    <td><?= $device['ram'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><i class="fas fa-hdd"></i> HDD</td>
                    <td><?= $device['hdd'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><i class="fas fa-plug"></i> Fonte</td>
                    <td><?= $device['fonte'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><i class="fas fa-ethernet"></i> MAC</td>
                    <td><?= $device['mac'] ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold"><i class="fab fa-windows icone"></i> OS</td>
                    <td><?= $device['os'] ?></td>
                </tr>
            </table>
        </div>
        <!-- Manutenções do computador seleciona -->
        <h2>Manutenções do computador <?= $device['nome'] ?></h2>
        <table class="table table-striped table-bordered table-responsive-sm">
            <thead>
            <tr>
                <th><a href="<?= addParamURL($urlAtual, $parametros = array('id' => $_GET['id'],'coluna' => 'id', 'ordem' => $cre_dec), null) ?>">ID<i class="fas fa-sort<?php echo $coluna == 'id' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
                <th><a href="<?= addParamURL($urlAtual, $parametros = array('id' => $_GET['id'],'coluna' => 'descricao', 'ordem' => $cre_dec), null) ?>">Descrição<i class="fas fa-sort<?php echo $coluna == 'descricao' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
                <th><a href="<?= addParamURL($urlAtual, $parametros = array('id' => $_GET['id'],'coluna' => 'tipo', 'ordem' => $cre_dec), null) ?>">Tipo<i class="fas fa-sort<?php echo $coluna == 'tipo' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
                <th><a href="<?= addParamURL($urlAtual, $parametros = array('id' => $_GET['id'],'coluna' => 'subtipo', 'ordem' => $cre_dec), null) ?>">Subtipo<i class="fas fa-sort<?php echo $coluna == 'subtipo' ? '-' . $cima_baixo : ''; ?>"></i></a></th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <!-- Listagem de manutenções geradas programaticamente, usando os registros do banco de dados -->
			<?php foreach ($maintenances as $maintenance): ?>
                <tr>
                    <td><?= $maintenance['id'] ?></td>
                    <td><?= $maintenance['tipo'] ?></td>
                    <td><?= $maintenance['subtipo'] ?></td>
                    <td><?= $maintenance['descricao'] ?></td>
                    <td class="text-right">
                        <a href="manutencao.php?id=<?= $maintenance['id'] ?>" class="btn btn-primary btn-sm"><i
                                    class="fas fa-search"></i></a>
						<?php if ($_SESSION['grupo'] != 'user') { ?>
                        <!-- Renderiza o botão de edição caso o usuário for moderador ou admin -->
                        <a href="atualizaManutencao.php?id=<?= $maintenance['id'] ?>" class="btn btn-primary btn-sm"><i
                                    class="fas fa-pen"></i></a>
                        <?php } ?>
                        <?php if($_SESSION['grupo'] == 'admin') {?>
                        <!-- Renderiza o botão de remoção caso o usuário for admin -->
                        <a href="computador.php?id=<?= $_GET['id'] ?>&apaga=<?= $maintenance['id'] ?>"
                           class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash"></i></a>
                        <?php } ?>
                    </td>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
</body>
</html>
